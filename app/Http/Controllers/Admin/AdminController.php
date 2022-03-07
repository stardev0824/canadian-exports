<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\AdminRequest;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $admins = Admin::all();
        return  view("admin.admins.index")->withAdmins($admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return  view("admin.admins.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request
     * @return Response
     */
    public function store(AdminRequest $request)
    {

        $admin = new Admin;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=bcrypt($request->password);
        $admin->save();
        Toastr::success("New Admin Account has been created successfully", 'success');

        return redirect(aurl("admins-account"));
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
        $admin = Admin::find($id);

        return view("admin.admins.edit",compact("admin"));
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

        $data = $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|email|unique:admins,email,'.$id,
            'password'=>'sometimes|nullable|min:6'
        ]);

        if ($request->has('password')){
            $data['password']=bcrypt($request->password);
        }

        Admin::where('id',$id)->update($data);

        Toastr::success("Admin Account has been updated successfully","success");
        return redirect()->route("admin.admins-account.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Admin::where("id",$id)->delete();
        Toastr::success("Admin Account has been deleted successfully","success");
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
