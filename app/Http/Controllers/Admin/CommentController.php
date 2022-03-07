<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view("admin.comment.index",compact("comments"));
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        Toastr::success("Comment Has Been Deleted Successfully","Success");
        return redirect(aurl("comment"));
    }
}
