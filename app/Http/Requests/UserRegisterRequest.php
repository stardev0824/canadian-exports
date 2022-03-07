<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "package"      =>"required|in:one,two,three",
            "name"         => "required|string|max:255",
            "email"        => "required|email|unique:users,email",
            "password"     => "required|min:6|confirmed",
            "categories"   => "required|max:3",
            "categories.*" =>"numeric",
            "company_name" =>"required|string|max:255",
            "company_email"=>"required|email",
            "address"      =>"required|string|max:255",
            "short_description"=>"required|string|max:300",
            "description"  =>"required|string",
            "phone"        =>"required|min:10|numeric",
            "site"         =>"required|url",
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
            "google"       =>"sometimes|nullable|url"
        ];
    }
}
