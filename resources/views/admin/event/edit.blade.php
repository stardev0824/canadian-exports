@extends("admin.layouts.app")

@section("title","edit Event")

@push("css")

@endpush

@section("content")
    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Update Event
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.event.update",$event->id)}}" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="title" id="title"  value="{{$event->title}}"class="form-control">
                                    <label class="form-label">Event Title</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="country" id="Country" value="{{$event->country}}" class="form-control">
                                    <label class="form-label">Event Country</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="city" id="city" value="{{$event->city}}" class="form-control">
                                    <label class="form-label">Event City</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="venue" id="venue" value="{{$event->venue}}" class="form-control">
                                    <label class="form-label">Event venue</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <b>Start Date</b>
                                    <input type="date" name="start_at" id="start_at" value="{{$event->start_at}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <b class="">End Date</b>
                                    <input type="date" name="end_at" id="end_at" value="{{$event->end_at}}" class="form-control">

                                </div>
                            </div>



                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="url" name="url" id="url" class="form-control" value="{{$event->url}}">
                                    <label class="form-label">LinkUrl</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <p>
                                    <b>Short Description</b>
                                </p>
                                <div class="form-line">
                                    <textarea name="description" id="description"  rows="5" class="form-control">
                                        {{$event->description}}
                                    </textarea>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{route("admin.event.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection

@push("js")


@endpush
