<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Event;
use App\Http\Requests\UserRegisterRequest;
use App\InfoLetter;
use App\Mail\CommentMail;
use App\Mail\ContactCompanyMail;
use App\Mail\InquireMail;
use App\Media;
use App\Profile;
use App\SocialMedia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NavigationController extends Controller
{
    public function getView($page)
    {
        if (view()->exists("pages.$page"))
            return view("pages.$page");
        abort(404);
    }
    public function contact()
    {
            return view("pages.contact");
    }
    public function comment_and_suggestion()
    {
            return view("pages.comment_and_suggestion");
    }
    public function change_lang($lang)
    {
        $array_lang = ["ar","bn","bu","ch","du","es","fa","fi","fr","ge",
            "gr","he","hi","in","it","ja","ko","ma","no","pl","po","ro","ru",
           "se","sp","th","tu","uk","vi"];
        if (in_array($lang,$array_lang))
        {
            session()->put("lang",$lang);
        }else
        {
            session()->put("lang","en");
        }
        return back();
    }

    public function register(UserRegisterRequest $request)
    {
        if($request->has('Recuring')=='true'){
            session()->put("recuring",true);
            session()->put("recuringPackage",$request->package);
        }
        // dd(session()->has('recuring'));
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'package' =>$request->package,
            'package_description' =>getPackageDescription($request->package)
        ]);

        $profile = Profile::create([
            'company_name'=>$request->company_name,
            'company_email'=>$request->company_email,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'phone'=>$request->phone,
            'site'=>$request->site,
            'key_word'=>$request->key_word,
            'address'=>$request->address,
            'langs'=>$request->langs,
            'user_id'=>$user->id
        ]);
        $categories = Category::find($request->categories);
        $profile->categories()->attach($categories);

        Media::create([
            "logo"=>upload($request->logo,"media"),
            "video"=>getVideoHtmlAttribute($request->video),
            "image_1"=>upload($request->image_1,"media"),
            "image_2"=>upload($request->image_2,"media"),
            "image_3"=>upload($request->image_3,"media"),
            "image_4"=>upload($request->image_4,"media"),
            "profile_id"=>$profile->id
        ]);

        SocialMedia::create([
            "facebook"=>$request->facebook,
            "twitter"=>$request->twitter,
            "youtube"=>$request->youtube,
            "linked_in"=>$request->linked_in,
            "google"=>$request->google,
            "profile_id"=>$profile->id
        ]);
        session()->put("user_id",$user->id);
        return view("auth.register_confirmed",compact("user"));
    }

    public function register_back($id)
    {
        $user = User::find($id);
        delete_profile($user->profile());
        $user->delete();
        return redirect("register");
    }



    public function getCategoryBySlug($slug)
    {
        $user_premium=DB::table('users')
            ->select('id')
            ->where("expired_at",">",now())
            ->get()->toArray();
        $data = [];
        foreach ($user_premium as $u)
        {
            $data[]=$u->id;
        }

        $category = Category::where("slug",$slug)->get()->first();
        $profiles_created_by_admin= $category->profiles()
            ->Where("user_id","=",0)->select("profiles.id")->get()->toArray();
        $profiles_created_by_users=$category->profiles()
            ->WhereIn("user_id",$data)->select("profiles.id")->get()->toArray();


       $profiles_id = array_merge($profiles_created_by_admin,$profiles_created_by_users);

        $data2 =[];
        foreach ($profiles_id as $u)
        {
            $data2[]=$u["id"];
        }
        $profiles = Profile::whereIn("id",$data2)->orderBy("updated_at","desc")->paginate(20);
        return view("profiles",compact("profiles","category"));
    }

    public function getProfile($id)
    {
        $profile = Profile::find($id);
        if (isset($profile) && ($profile->user_id==0 || $profile->user()->expired_at>now()))
        {
            return \view("profile",compact("profile"));
        }
        return redirect("/");
    }
    public function searchProfile($id)
    {
        $searchres=DB::table('profiles')
            ->select('company_email')
            ->where("id","=",$id)
            ->get()->toArray();
        $data = [];
        foreach ($searchres as $u)
        {
            $data[]=$u->company_email;
        }
        return $data;
    }

    public function sendAndStoreComment(Request $request)
    {
        $data = $this->validate($request,[
            "name"=>"required|string|max:255",
            "email"=>"required|email",
            "comment"=>"required|string",
            "g-recaptcha-response" => "required|captcha",
        ]);

        Comment::create($data);

        Mail::to(getInfos()->email)->send(new CommentMail($data));
        session()->flash('success',"Thank you for contacting us. <br><small>If you have requested a response, we will do our best to respond to you within 2 business days.</small>");
        return back();

    }

    public function company_contact(Request $request,$company_email)
    {
        $data = $this->validate($request,[
            "name"=>"required|string|max:255",
            "email"=>"required|email",
            "company"=>"required|string|max:255",
            "message"=>"required|string",
            "g-recaptcha-response" => "required|captcha",
        ]);

        Mail::to($company_email)->send(new ContactCompanyMail($data) );

        session()->flash("success","Email has been sent successfully");
        return back();
    }

    public function infoLetter(Request $request)
    {
        $data = $this->validate($request,[
           "name"=>"required|string|max:255",
           "country"=> "required|string|max:255",
            "email"=>"required|email|unique:info_letters,email",
            "company_name"=>"required|string|max:255",
            "g-recaptcha-response" => "required|captcha",
        ]);
        InfoLetter::create($data);

        session()->flash("success","ok");
        return back();

    }

    public function getEvent($id)
    {
        $event = Event::find($id);
        if (isset($event))
        {
            return \view("event",compact("event"));
        }
        return redirect("/");
    }

    public function inquire_send(Request $request)
    {
        $data = $this->validate($request,[
           "name"=>"required",
           "email"=>"required|email",
           "item"=>"required",
           "g-recaptcha-response" => "required|captcha",
        ]);
        Mail::to(getInfos()->sales_department_email)->send(new InquireMail($data) );
        session()->flash("success","Thank you for your Inquiry. If you are a premium member, we will send you the details free of charge within two business days.");
        return back();
    }
}


