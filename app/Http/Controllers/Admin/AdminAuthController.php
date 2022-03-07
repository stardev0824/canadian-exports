<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware("guest:admin")->except("logout");
    }

    public function get_login_form()
    {
        return view("admin.auth.login");
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            "email"=>"required|email",
            "password"=>"required"
        ]);
        $remember_me = $request->remember_me==1?true:false;
        if (admin()->attempt(['email'=>$request->email,'password'=>$request->password],$remember_me))
        {
            return redirect()->intended(aurl("dashboard"));
        }else
        {
            session()->flash('error',"incorrect information login");
            return redirect(aurl("login"));
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(aurl('login'));
    }

    public function get_forgot_password_form()
    {
        return view("admin.auth.forgot_password");
    }

    public function forgot_password(Request $request)
    {
        $this->validate($request,[
            "email"=>"required|email"
        ]);

        $admin = Admin::where('email',\request('email'))->first();
        if (!empty($admin))
        {
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table("password_resets")->insert([
                'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            session()->flash('success',trans('passwords.sent'));
            return back();
        }

        session()->flash('error',trans('passwords.user'));
        return back();
    }

    public function get_reset_password_form($token)
    {
        $check_token= DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHour(2))->first();
        if (!empty($check_token))
        {
            return view('admin.auth.reset_password')->with(['data'=>$check_token]);
        }else
        {
            session()->flash("error",trans("passwords.token"));
            return redirect(aurl('forgot/password'));
        }
    }

    public function reset_password($token,Request $request)
    {

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|string|min:6|confirmed',
            'password_confirmation'=>'required',

        ]);
        $check_token= DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHour(2))->first();
        if (!empty($check_token))
        {
            $admin = Admin::where('email',$check_token->email)->update(['password'=>bcrypt($request->password)]);
            DB::table('password_resets')->where('email',\request('email'))->delete();
            session()->flash("success",trans("passwords.reset"));
            return redirect(aurl('login'));
        }else
        {
            return redirect(aurl('forgot/password'));
        }
    }
}
