<?php

namespace App\Http\Controllers\Auth;

use App\Media;
use App\Profile;
use App\SocialMedia;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    protected function validator(array $data)
    {
        return  $this->validate($data,[
            "name"=>"required|string|max:255",
            "email"=>"required|string|email|unique:users,email",
            "password"=>"required|string|confirmed|min:6",
            "company_name"=>"required|string|max:255",
            "company_email"=>"required|string|email",
            "address"=>"required|string",
            "short_description"=>"required|string|max:255",
            "description"=>"required|string",
            "tag_line"=>"sometimes|nullable|string|max:255",
            "key_word"=>"required|string",
            "list"=>"required",
            "list.*"=>"numeric",
            "phone"=>"required|numeric",
            "site"=>"required|url",
            "logo"=>"sometimes|nullable|image",
            "video"=>"sometimes|nullable|url",
            "image_1"=>"sometimes|nullable|image",
            "image_2"=>"sometimes|nullable|image",
            "image_3"=>"sometimes|nullable|image",
            "image_4"=>"sometimes|nullable|image",
            "facebook"=>"sometimes|nullable|url",
            "twitter"=>"sometimes|nullable|url",
            "google"=>"sometimes|nullable|url",
            "youtube"=>"sometimes|nullable|url",
            "linked_in"=>"sometimes|nullable|url",
        ]);



    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user_info =$data['user'];

        $user =  User::create([
            'name' => $user_info["name"],
            'email' => $user_info["email"],
            'password' => Hash::make($user_info["password"]),
        ]);

        $profile_info = $data['profile'];
        $this->profileRegister($profile_info,$user->id);

        $media_info = $data["media"];
        $this->mediaRegister($media_info,$user->id);

        $social_media_info= $data["social_media"];
        $this->socialMediaRegister($social_media_info,$user->id);

        return $user;
    }


    private function profileRegister($data,$user_id)
    {
        $profile = New Profile;
        $profile->company_name       = $data["company_name"];
        $profile->company_email      = $data["company_email"];
        $profile->address            = $data["address"];
        $profile->short_description  = $data["short_description"];
        $profile->description        = $data["description"];
        $profile->key_word           = $data["key_word"];
        $profile->phone              = $data["phone"];
        $profile->site               = $data["site"];
        $profile->user_id =$user_id;
        if (isset($data["tag_line"]))
        {
            $profile->tag_line = $data["tag_line"];
        }

        $profile->save();
        return $profile;
    }

    private function mediaRegister($data,$user_id)
    {
        $media = New Media;
        $media->logo       = $data["logo"];
        $media->video      = $data["video"];
        $media->image_1    = $data["image_1"];
        $media->image_2    = $data["image_2"];
        $media->image_3    = $data["image_3"];
        $media->image_4    = $data["image_4"];
        $media->user_id =$user_id;
        $media->save();
        return $media;
    }

    private function socialMediaRegister($data,$user_id)
    {
        $social_media = New SocialMedia;
        $social_media->facebook       = $data["facebook"];
        $social_media->twitter      = $data["twitter"];
        $social_media->google    = $data["google"];
        $social_media->youtube    = $data["youtube"];
        $social_media->linked_in    = $data["linked_in"];
        $social_media->user_id = $user_id->id;
        $social_media->save();
        return $social_media;
    }
}
