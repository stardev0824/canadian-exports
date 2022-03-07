<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            "title"=>"required|string|max:255",
            "start_at"=>"required|date",
            "end_at"=>"required|date",
            "city"=>"required|string|max:255",
            "country"=>"required|string|max:255",
            "venue"=>"required|string|max:255",
            "description"=>"required|string",
            "url"=>"required|url|active_url",
        ];
    }
}
