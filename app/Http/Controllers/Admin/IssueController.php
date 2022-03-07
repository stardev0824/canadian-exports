<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Issue;
use Brian2694\Toastr\Facades\Toastr;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $issues=Issue::all();
        return response(view("admin.issue.index",compact("issues")),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \response(view("admin.issue.create"));
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
            "title"=>"required|string|max:255",
            "pdf"=>"required|mimes:pdf|max:100000",
            "front_image"=>"required|image|max:10000",
        ]);
        //********* pdf ****************//
        $pdf = $request->file("pdf");

        $data["pdf"]=$this->storeFile("issue/pdf",$pdf);
        $image = $request->file("front_image");
        $data["front_image"]=$this->storeFile("issue/image",$image);
        $data["pdf_original_name"]=$pdf->getClientOriginalName();

        if ($request->is_current_issue=="on")
        {
            $data["is_current_issue"]=true;
            Issue::query()->update(['is_current_issue' => false]);
        }else
        {
            $data["is_current_issue"]=false;
        }
        Issue::create($data);
        Toastr::success("Issue has been created successfully","success");
        return redirect(aurl("issue"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return Response
     */
    public function show(Issue $issue)
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
        $issue=Issue::where("id",$id)->get()->first();
        return \response(view("admin.issue.edit",["issue"=>$issue]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request,[
            "title"=>"required|string|max:255",
        ]);
        if ($request->is_current_issue=="on")
        {
            $data['is_current_issue']=true;
            Issue::query()->update(["is_current_issue"=>false]);
        }else
        {
            $data['is_current_issue']=false;
        }

        Issue::where('id',$id)->update($data);
        Toastr::success("Issue has been updated successfully","success");
        return redirect(aurl("issue"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return Response
     */
    public function destroy($id)
    {
        $issue=Issue::find($id);
        Storage::has($issue->pdf)?Storage::delete($issue->pdf):"";
        Storage::has($issue->front_image)?Storage::delete($issue->front_image):"";
        $issue->delete();
        Toastr::success("Issue has been deleted successfully","success");
        return redirect(aurl("issue"));
    }


    private function storeFile($path,$file)
    {
        $hashName = $file->hashName();
        $file->store($path);

        return $path.'/'.$hashName;
    }
}
