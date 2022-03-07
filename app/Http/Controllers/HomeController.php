<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile_update(Request $request)
    {

        $data = $this->validate($request,[
            "company_name" =>"required|string|max:255",
            "company_email"=>"required|email",
            "address"      =>"required|string|max:255",
            "short_description"=>"required|string|max:300",
            "description"  =>"required|string",
            "phone"        =>"required|min:10|numeric",
            "site"         =>"required|url",
            "key_word"     =>"required",
            "fax"          =>"sometimes|nullable|numeric|min:10",
            "tag_line"     =>"sometimes|nullable|string|max:255"
        ]);

        auth()->user()->profile()->update($data);
        session()->flash("success","Profile has been updated successfully");
        return back();
    }

    public function social_media()
    {
        return view("social-media");
    }

    public function social_media_update(Request $request)
    {
         $data = $this->validate($request,[
             "facebook"     =>"sometimes|nullable|url",
             "youtube"      =>"sometimes|nullable|url",
             "twitter"      =>"sometimes|nullable|url",
             "linked_in"    =>"sometimes|nullable|url",
             "google"       =>"sometimes|nullable|url"
         ]);

         auth()->user()->profile()->social_media()->update($data);
        session()->flash("success","Social-Media has been updated successfully");
        return back();

    }

    public function media()
    {
        return view("media");
    }

    public function media_update(Request $request)
    {
        $data=$this->validate($request,[
            "logo"         =>"sometimes|nullable|image",
            "video"        =>"sometimes|nullable|url",
            "image_1"      =>"sometimes|nullable|image",
            "image_2"      =>"sometimes|nullable|image",
            "image_3"      =>"sometimes|nullable|image",
            "image_4"      =>"sometimes|nullable|image",
        ]);



        if ($request->hasFile("logo"))
        {
            Storage::has(auth_profile()->media()->get()->first()->logo)?Storage::delete(auth_profile()->media()->get()->first()->logo):"";
            $data["logo"]=upload($request->logo,"media");
        }
        if ($request->hasFile("image_1"))
        {
            Storage::has(auth_profile()->media()->get()->first()->image_1)?Storage::delete(auth_profile()->media()->get()->first()->image_1):"";
            $data["image_1"]=upload($request->image_1,"media");
        }
        if ($request->hasFile("image_2"))
        {
            Storage::has(auth_profile()->media()->get()->first()->image_2)?Storage::delete(auth_profile()->media()->get()->first()->image_2):"";
            $data["image_2"]=upload($request->image_2,"media");
        }
        if ($request->hasFile("image_3"))
        {
            Storage::has(auth_profile()->media()->get()->first()->image_2)?Storage::delete(auth_profile()->media()->get()->first()->image_2):"";
            $data["image_3"]=upload($request->image_3,"media");
        }
        if ($request->hasFile("image_4"))
        {
            Storage::has(auth_profile()->media()->get()->first()->image_4)?Storage::delete(auth_profile()->media()->get()->first()->image_4):"";
            $data["image_4"]=upload($request->image_4,"media");
        }

        $data["video"]=getVideoHtmlAttribute($request->video);
        auth_profile()->media()->update($data);

        session()->flash("success","Media has been updated successfully");
        return back();
    }

    public function update_account(Request $request)
    {
        $data = $this->validate($request,[
            "name"=>"required|string|max:255",
            "email"=>"required|email|unique:users,email,".auth()->user()->id
        ]);
        auth()->user()->update($data);
        session()->flash("success","Account has been updated successfully");
        return back();
    }

}
