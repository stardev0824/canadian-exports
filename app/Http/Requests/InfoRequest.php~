<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            "location"=>"required",
            "too_free"=>"sometimes|nullable",
            "email"=>"required|email",
            "sales_department_email"=>"sometimes|nullable|email",
            "employment_email"=>"sometimes|nullable|email",
            "office_hours"=>"required",
            "langs"=>"required",
            "site"=>"required",
            "fax"=>"required",
            "facebook"=>"sometimes|nullable",
            "twitter"=>"sometimes|nullable",
            "phone"=>"required",
            "linked_in"=>"sometimes|nullable",
            "google"=>"sometimes|nullable",
            "youtube"=>"sometimes|nullable",
        ];
    }
}
