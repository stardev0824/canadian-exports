<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::all();
        return view("admin.event.index",['events'=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return  view("admin.event.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return Response
     */
    public function store(EventRequest $request)
    {
        if ($request->start_at<$request->end_at)
        {
            Event::create($request->except("token"));
            Toastr::success("Event Has been Created Successfully","Success");
            return redirect()->route("admin.event.index");
        }

        Toastr::error("the start date must be lower than the end date","error");
        return back()->withInput(["title","venue","city","country","description","url"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return Response
     */
    public function show(Event $event)
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
        $event = Event::find($id);
        return view("admin.event.edit",compact("event"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return Response
     */
    public function update(EventRequest $request, $id)
    {
        if ($request->start_at<$request->end_at) {
            Event::where("id", $id)->update($request->except("_token","_method"));
            Toastr::success("Event Has been Updated Successfully", "Success");
            return redirect(aurl("event"));
        }
        Toastr::error("the start date must be lower than the end date","error");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        Toastr::success("Event Has been deleted Successfully","Success");
        return redirect(aurl("event"));
    }
}
