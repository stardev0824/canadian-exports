<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Ads;
use App\Http\Requests\AdminRequest;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdsController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return  view("admin.ads.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_name' => 'required|max:20',
            'url' => 'required|max:100',
            'length' => 'required|max:20',
            'tuition_canadian_students' => 'required|max:20',
            'tuition_international_students' => 'required|max:20',
        ]);
        $admin = new Ads;
        $admin->program_name=$request->program_name;
        $admin->program_url=$request->url;
        $admin->length=$request->length;
        $admin->tuition_canadian_students=$request->tuition_canadian_students;
        $admin->tuition_international_students=$request->tuition_international_students;
        $admin->save();
        Toastr::success("New Add has been created successfully", 'success');

        return redirect(aurl("ads"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $admin = Ads::find($id);

        return view("admin.ads.edit",compact("admin"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'program_name' => 'required|max:20',
            'program_url' => 'required|max:100',
            'length' => 'required|max:20',
            'tuition_canadian_students' => 'required|max:20',
            'tuition_international_students' => 'required|max:20',
        ]);
//print_r($request->toArray());die;
        Ads::where('id',$id)->update($data);

        Toastr::success("Your Add has been updated successfully","success");
        return redirect()->route("admin.ads.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Ads::where("id",$id)->delete();
        Toastr::success("Add has been deleted successfully","success");
        return redirect()->back();
    }


    public function getAllUsers()
    {
       $users = User::all();
        return view("admin.user.index",compact("users"));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        delete_profile($user->profile());
        $user->delete();
        Toastr::success("User Account has been deleted successfully","success");
        return redirect(aurl("user"));
    }
}
