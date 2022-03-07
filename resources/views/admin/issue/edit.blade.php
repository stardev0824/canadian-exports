@extends("admin.layouts.app")

@section("title","edit Issue")

@push("css")
    <link href="{{asset("assets/back_end/plugins/bootstrap-select/css/bootstrap-select.css")}}" rel="stylesheet" />

@endpush

@section("content")
    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Update Issue
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.issue.update",$issue->id)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="title" id="title" value="{{$issue->title}}" class="form-control">
                                    <label class="form-label">Title</label>
                                </div>
                            </div>
                            <div class="demo-switch">
                                <div class="switch">
                                    <label>Is Current Issue ? No<input type="checkbox" name="is_current_issue"
                                            {{$issue->is_current_issue==true?"checked":""}}>
                                        <span class="lever"></span>Yes</label>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{route("admin.issue.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection

@push("js")

    <script src="{{asset("assets/back_end/plugins/bootstrap-select/js/bootstrap-select.js")}}"></script>

@endpush
