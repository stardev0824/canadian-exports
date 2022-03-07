<?php

namespace App\Http\Controllers\Admin;

use App\AdsBanner;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdsBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $allBS = AdsBanner::all();
        return  view("admin.ads_banner.index")->with("allBS",$allBS);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.ads_banner.create");
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
        $data = $this->validate(
            $request,[
            "url"=>"required|url",
            "image"=>"required|image|max:10000|dimensions:max_width=960,max_height=90"
        ],['image.dimensions' => 'Ads banner image dimensions must be 290*90',
        'image.required' => 'Ads banner image must be required'
        ]);
        $file = $request->file('image');
        $file->getClientOriginalName();
        $file->getClientOriginalExtension();
        $file->getRealPath();
        $file->getSize();
        $file->getMimeType();
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $url = $destinationPath.'/'.$file->getClientOriginalName();
        $image = $request->file("image");
        $data['image']=$url;
        AdsBanner::create($data);
        Toastr::success("Ads banner has been created successfully","success");
        return redirect(aurl("ads_banner"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BannerAndSponsor  $bannerAndSponsor
     * @return Response
     */
    public function show(BannerAndSponsor $bannerAndSponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $bs = AdsBanner::find($id);
        return view("admin.ads_banner.edit")->with("bs",$bs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request,[
            "url"=>"required|url|active_url",
            "image"=>"sometimes|nullable|image|max:10000"
        ]);
        $bs = AdsBanner::where("id",$id)->get()->first();

        if ($request->hasFile("image"))
        {
            $file = $request->file('image');
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getRealPath();
            $file->getSize();
            $file->getMimeType();
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $url = $destinationPath.'/'.$file->getClientOriginalName();
            $image = $request->file("image");
        }else
        {
            $data['image']=$bs->image;
        }

        $bs->update($data);
        Toastr::success("Ads banner has been updated successfully","success");
        return redirect(aurl("ads_banner"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BannerAndSponsor  $bannerAndSponsor
     * @return Response
     */
    public function destroy($id)
    {
        $bs = AdsBanner::find($id);
        $bs->delete();
        Toastr::success("Ads banner has been deleted successfully","success");
        return redirect(aurl("ads_banner"));
    }
}
