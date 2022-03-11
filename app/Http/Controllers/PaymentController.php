<?php


namespace App\Http\Controllers;

use App\Paypal\CreatePayment;
use App\Paypal\ExecutePayment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

	
class PaymentController extends Controller
{
    public function create(Request $request)
    {

        if(\request()->path()=="register-revive")
        {
            $this->validate($request,['package'=>"required|in:zero,one,two,three,four,five,six"]);
            auth()->user()->update([
                "package"=>$request->package,
                "package_description"=>getPackageDescription($request->package)
            ]);
            session()->put("user_id",auth()->user()->id);
        }
         // dd(session()->has('recuring') == true);
        if(session()->has('recuring') == true){
            return redirect()->route('rpayment',"12345");
        }
        if($request->package == "zero")  // in Free plan. Don't need to pay
            return redirect("/");

        $payment = new CreatePayment();
        $user = User::find(session("user_id"));
        $description =$user->package_description;
        if (session()->has("price") && isset($description)){
            return $payment->create(session("price"),$description);
        }
        session()->flash("error","Oops Something Wrong, Payment failed");
        return redirect("/");
    }

    public function execute(Request $request)
    {
        $payment=new ExecutePayment();
        Log::info(json_encode($request->all()));
        if (session()->has("user_id") && isset($request->PayerID) && isset($request->token))
        {
            $user = User::find(session("user_id"));
            $user->update(["payment_status"=>"Waiting"]);
            if (session()->has("price")){
                
                return  $payment->execute($request,session("price"));
            }
            session()->flash("error","Oops Something Wrong, Payment failed");
            return redirect("/");
        }
        session()->flash("error","Oops Something Wrong, Payment failed");
        return redirect("/");

    }
    
    public function cancel(Request $request){
    	  $info_price = session("price");

        session()->forget("price");
        $user = User::find(session("user_id"));
        $user->update([
            "payment_status"=>"Canceled"
        ]);
        session()->forget("user_id");
        session()->flash("error","User cancelled the payment.");   
        return redirect("/");
    }
}
