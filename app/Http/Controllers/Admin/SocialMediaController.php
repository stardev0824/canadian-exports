<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoRequest;
use App\SocialMedia;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        return view("admin.social_media.index");
    }


    public function update(InfoRequest $request)
    {
        getInfos()->update($request->except("token"));
        Toastr::success("Data has been updated successfully","Success");
        return redirect(aurl("dashboard"));
    }

}
