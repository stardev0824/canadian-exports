<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Ads;
use App\AdsBanner;
use App\Http\Requests\AdminRequest;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class FrontAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $get = Ads::all();
        return view('admin.ads.index', ['get' => $get]);
    }
    
    public function getbanner(){
        $get = AdsBanner::all();
        return json_encode($get);
    }

}
