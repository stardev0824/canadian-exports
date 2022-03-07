<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return  view("admin.category.index",["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return  view("admin.category.create");
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
        $this->validate($request,
            [
                'name_en'=>'required|string|unique:categories,name_en',
                'name_fr'=>'required|string|unique:categories,name_fr'
            ]);
        Category::create([
            "name_en"=>$request->name_en,
            "name_fr"=>$request->name_fr,
            "slug"=>Str::slug($request->name_en)
        ]);
        Toastr::success("New Category has been created successfully","success");
        return redirect()->route("admin.category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view("admin.category.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,
            [
                "name_en"=>"required|string|unique:categories,name_en,".$id,
                "name_fr"=>"required|string|unique:categories,name_fr,".$id,
            ]);
        Category::where('id',$id)->update([
            'name_en'=>$request->name_en,
            'name_fr'=>$request->name_en,
            'slug'=>Str::slug($request->name_en)
        ]);

        Toastr::success("Category has been updated successfully","success");
        return redirect()->route("admin.category.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::where("id",$id)->delete();
        Toastr::success('Category has been deleted successfully',"success");
        return redirect()->route("admin.category.index");
    }
}
