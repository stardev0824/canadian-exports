<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Media;
use App\Profile;
use App\SocialMedia;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($all=false)
    {



            $profiles = Profile::where("user_id",0)->orderBy("created_at","desc")->get();


        return  view("admin.profile.index",compact("profiles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return  view("admin.profile.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            "categories"   => "required|max:3",
            "categories.*" =>"numeric",
            "company_name" =>"required|string|max:255",
            "company_email"=>"required|email",
            "address"      =>"required|string|max:255",
            "short_description"=>"required|string|max:300",
            "description"  =>"required|string",
            "phone"        =>"required|min:10",
            "fax"           =>"sometimes|nullable|min:10",
            "site"         =>"required|url",
            "tag_line"         =>"sometimes|nullable",
            "key_word"     =>"required",
            "logo"         =>"sometimes|nullable|image",
            "video"        =>"sometimes|nullable|url",
            "image_1"      =>"sometimes|nullable|image",
            "image_2"      =>"sometimes|nullable|image",
            "image_3"      =>"sometimes|nullable|image",
            "image_4"      =>"sometimes|nullable|image",
            "facebook"     =>"sometimes|nullable|url",
            "youtube"      =>"sometimes|nullable|url",
            "twitter"      =>"sometimes|nullable|url",
            "linked_in"    =>"sometimes|nullable|url",
            "google"       =>"sometimes|nullable|url",
            "langs"       =>"string"
        ]);

       $profile =  Profile::create([
            'company_name'=>$request->company_name,
            'company_email'=>$request->company_email,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'phone'=>$request->phone,
            'site'=>$request->site,
            'fax'=>$request->fax,
            "tag_line"         =>$request->tag_line,
            'key_word'=>$request->key_word,
            'address'=>$request->address,
            'langs'=>$request->langs,
            'user_id'=>0
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
            "profile_id"=>$profile->id,
            "facebook"=>$request->facebook,
            "twitter"=>$request->twitter,
            "youtube"=>$request->youtube,
            "linked_in"=>$request->linked_in,
            "google"=>$request->google,
        ]);

        Toastr::success("Profile has been created successfully","Success");
        return redirect(aurl("profile"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        if (isset($profile))
            return view("admin.profile.show",compact("profile"));
        return redirect()->route("admin.profile.index");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        if (isset($profile))
            return view("admin.profile.edit",compact("profile"));

        return redirect()->route("admin.profile.index");

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, $id)
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
        "tag_line"         =>"sometimes|nullable",
        "logo"         =>"sometimes|nullable|image",
        "video"        =>"sometimes|nullable|url",
        "image_1"      =>"sometimes|nullable|image",
        "image_2"      =>"sometimes|nullable|image",
        "image_3"      =>"sometimes|nullable|image",
        "image_4"      =>"sometimes|nullable|image",
        "facebook"     =>"sometimes|nullable|url",
        "youtube"      =>"sometimes|nullable|url",
        "twitter"      =>"sometimes|nullable|url",
        "linked_in"    =>"sometimes|nullable|url",
        "google"       =>"sometimes|nullable|url",
        "langs"       =>"string"
    ]);
        $profile = Profile::find($id);

        $media=[];

        if ($request->hasFile("logo"))
        {
            Storage::has($profile->media()->get()->first()->logo)?Storage::delete($profile->media()->get()->first()->logo):"";
            $media["logo"] =upload($request->logo,"media");
        }
        if ($request->hasFile("image_1"))
        {
            Storage::has($profile->media()->get()->first()->image_1)?Storage::delete($profile->media()->get()->first()->image_1):"";
            $media["image_1"] =upload($request->image_1,"media");
        }
        if ($request->hasFile("image_2"))
        {
            Storage::has($profile->media()->get()->first()->image_2)?Storage::delete($profile->media()->get()->first()->image_2):"";
            $media["image_2"]  =upload($request->image_2,"media");
        }
        if ($request->hasFile("image_3"))
        {
            Storage::has($profile->media()->get()->first()->image_3)?Storage::delete($profile->media()->get()->first()->image_3):"";
            $media["image_3"] =upload($request->image_3,"media");
        }
        if ($request->hasFile("image_4"))
        {
            Storage::has($profile->media()->get()->first()->image_4)?Storage::delete($profile->media()->get()->first()->image_4):"";
            $media["image_4"] =upload($request->image_4,"media");
        }

        $profile->update([
            'company_name'=>$request->company_name,
            'company_email'=>$request->company_email,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'phone'=>$request->phone,
            'site'=>$request->site,
            'key_word'=>$request->key_word,
            'address'=>$request->address,
            "tag_line"=>$request->tag_line,
            "langs"=>$request->langs,
            'user_id'=>0
            ]);

        $media["video"]=getVideoHtmlAttribute($request->video);
        $profile->media()->update($media);

        $profile->social_media()->update([
            "facebook"=>$request->facebook,
            "twitter"=>$request->twitter,
            "youtube"=>$request->youtube,
            "linked_in"=>$request->linked_in,
            "google"=>$request->google,
        ]);
        Toastr::success("Profile has been Updated successfully","Success");
        return redirect(aurl("profile"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $profile=Profile::find($id);
        delete_profile($profile);
        Toastr::success("Profile has been Deleted successfully","Success");

        return redirect(aurl("profile"));

    }
}
