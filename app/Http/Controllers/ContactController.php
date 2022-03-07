<?php

namespace App\Http\Controllers;

use App\Mail\ContactCompanyMail;
use App\Mail\ContactMail;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $data = $this->validate($request,[
            "name"=>"required|string|max:255",
            "email"=>"required|email",
            "message"=>"required|string",
            "g-recaptcha-response" => "required|captcha",
        ]);

        Mail::to(getInfos()->email)->send(new ContactMail($data));
        session()->flash('success',"Thank you for contacting us. <br><small>If you have requested a response, we will do our best to respond to you within 2 business days.</small>");
        return back();
    }

    public function contact_company($profile_id,Request $request)
    {
        $data = $this->validate($request,[
            "name"=>"required|string|max:255",
            "email"=>"required|email",
            "message"=>"required|string",
            "g-recaptcha-response" => "required|captcha",
        ]);
        $profile=Profile::find($profile_id);
        if (isset($profile))
        {
            Mail::to($profile->email)->send(new ContactCompanyMail($data));
            session()->flash('success',"Thank you for contacting us. <br><small>If you have requested a response, we will do our best to respond to you within 2 business days.</small>");
            return back();
        }
        session()->flash('error',"Email has been sent successfully");
        return back();

    }

}
