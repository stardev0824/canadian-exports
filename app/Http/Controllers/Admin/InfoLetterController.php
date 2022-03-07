<?php

namespace App\Http\Controllers\Admin;

use App\InfoLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoLetterController extends Controller
{

    public function index()
    {
        $infos = InfoLetter::all();
        return view("admin.info-letter.index",compact("infos"));
    }

    public  function delete($id)
    {
        $info = InfoLetter::find($id);
        $info->delete();
        return redirect(aurl("info-letter"));
    }

}
