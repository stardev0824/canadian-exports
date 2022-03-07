@extends("admin.layouts.app")

@section("title","Create New Event")

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
                            Create New Event
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.event.store")}}" method="post">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="title" id="title"  value="{{old("title")}}"class="form-control">
                                    <label class="form-label">Event Title</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="country" id="Country" value="{{old("country")}}" class="form-control">
                                    <label class="form-label">Event Country</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="city" id="city" value="{{old("city")}}" class="form-control">
                                    <label class="form-label">Event City</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="venue" id="venue" value="{{old("venue")}}" class="form-control">
                                    <label class="form-label">Event venue</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <b>Start Date</b>
                                    <input type="date" name="start_at" id="start_at" class="form-control">
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <b class="">End Date</b>
                                    <input type="date" name="end_at" id="end_at" class="form-control">

                                </div>
                            </div>



                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="url" name="url" id="url" class="form-control" value="{{old("url")}}">
                                    <label class="form-label">LinkUrl</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <p>
                                    <b>Short Description</b>
                                </p>
                                <div class="form-line">
                                    <textarea name="description" id="description"  rows="5" class="form-control">{{old("description")}}</textarea>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create Event</button>
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
