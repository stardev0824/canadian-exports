@extends("admin.layouts.app")

@section("title","Create New Issue")

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
                            Create New Issue
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.issue.store")}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="title" id="title" class="form-control">
                                    <label class="form-label">Title</label>
                                </div>
                            </div>

                            <div class="form-line form-group">
                                <label for="image">PDF</label>
                                <input type="file" name="pdf" class="form-control-file" id="pdf">
                            </div>

                            <div class="form-line form-group">
                                <label for="image">Front Image</label>
                                <input type="file" name="front_image" class="form-control-file" id="image">
                            </div>

                            <div class="demo-switch">
                                <div class="switch">
                                    <label>Is Current Issue ? No<input type="checkbox" name="is_current_issue" checked><span class="lever"></span>Yes</label>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create Issue</button>
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

@endpush
