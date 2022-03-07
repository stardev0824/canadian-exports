<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $testimonials= Testimonial::all();
        return  view("admin.testimonial.index",compact("testimonials"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return  view("admin.testimonial.create")->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            "name"=>"required|string|max:255",
            "place"=>"required|string|max:255",
            "comment"=>"required|string",
            "category_id"=>"required"
        ]);

        Testimonial::create($data);
        Toastr::success("New Testimonial has been created successfully","success");
        return  redirect()->route("admin.testimonial.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Testimonial  $testimonial
     * @return Response
     */
    public function show(Testimonial $testimonial)
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
        $testimonial= Testimonial::find($id);
        $categories = Category::all();

        return  view("admin.testimonial.edit",compact("testimonial"))->with("categories",$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request,[
            "name"=>"required|string|max:255",
            "place"=>"required|string|max:255",
            "comment"=>"required|string",
            "category_id"=>"required"
        ]);

        Testimonial::where("id",$id)->update($data);

        Toastr::success("Testimonial has been updated successfully","success");
        return  redirect()->route("admin.testimonial.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        Testimonial::where("id",$id)->delete();
        Toastr::success("Testimonial has been deleted successfully","success");
        return  redirect()->route("admin.testimonial.index");
    }
}
