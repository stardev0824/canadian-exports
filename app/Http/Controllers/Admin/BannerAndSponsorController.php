<?php

namespace App\Http\Controllers\Admin;

use App\BannerAndSponsor;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class BannerAndSponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $allBS = BannerAndSponsor::all();
        return  view("admin.banner_and_sponsor.index")->with("allBS",$allBS);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.banner_and_sponsor.create");
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
            "url"=>"required|url",
            "image"=>"required|image|max:10000",
            "type"=>"required"
        ]);

        $image = $request->file("image");

        $hashName= $image->hashName();
        $path='banner_sponsor/images';
        $data['image']=$path.'/'.$hashName;
        $image->store($path);

        BannerAndSponsor::create($data);
        Toastr::success($data["type"]."has been created successfully","success");
        return redirect(aurl("banners_and_sponsors"));

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
        $bs = BannerAndSponsor::find($id);
        return view("admin.banner_and_sponsor.edit")->with("bs",$bs);
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
            "image"=>"sometimes|nullable|image|max:10000",
            "type"=>"required"
        ]);
        $bs = BannerAndSponsor::where("id",$id)->get()->first();

        if ($request->hasFile("image"))
        {
            if (isset($bs))
            {
                Storage::has($bs->image)?Storage::delete($bs->image):'';
            }

            $image = $request->file("image");

            $hashName= $image->hashName();
            $path='banner_sponsor/images';
            $data['image']=$path.'/'.$hashName;
            $image->store($path);
        }else
        {
            $data['image']=$bs->image;
        }

        $bs->update($data);
        Toastr::success($data["type"]."has been updated successfully","success");
        return redirect(aurl("banners_and_sponsors"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BannerAndSponsor  $bannerAndSponsor
     * @return Response
     */
    public function destroy($id)
    {
        $bs = BannerAndSponsor::find($id);
        Storage::has($bs->image)?Storage::delete($bs->image):'';
        $bs->delete();
        Toastr::success($bs->type."has been updated successfully","success");
        return redirect(aurl("banners_and_sponsors"));
    }
}
