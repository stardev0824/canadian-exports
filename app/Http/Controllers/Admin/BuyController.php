<?php

namespace App\Http\Controllers\Admin;

use App\Buy;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $buys = Buy::orderBy("created_at","desc")->get();
        return  view("admin.buy.index",compact("buys"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return  view("admin.buy.create");
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
            "name"=>"required|string",
            "country"=>"required|string",
            "dead_line"=>"required|string",
            "value"=>"required|string",
            "category"=>"required|string",
        ]);

        Buy::create($data);
        Toastr::success("Item has been Created Successfully","Success");
        return  redirect(aurl("buy"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buy  $buy
     * @return Response
     */
    public function show(Buy $buy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buy  $buy
     * @return Response
     */
    public function edit($id)
    {
        $buy = Buy::find($id);
        if (isset($buy)) return  view("admin.buy.edit",compact("buy"));
        return  redirect(aurl("buy"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request,  $id)
    {
        $data = $this->validate($request,[
            "name"=>"required|string",
            "country"=>"required|string",
            "dead_line"=>"required|string",
            "value"=>"required|string",
            "category"=>"required|string",
        ]);
        Buy::find($id)->update($data);
        Toastr::success("Item has been Updated Successfully","Success");
        return  redirect(aurl("buy"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        Buy::find($id)->delete();
        Toastr::success("Item has been deleted Successfully","Success");
        return  redirect(aurl("buy"));
    }
}
