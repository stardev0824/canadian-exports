@extends("admin.layouts.app")

@section("title","edit Account")

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
                            Edit Account
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route("admin.ads.update",$admin->id)}}" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="program_name" id="program_name" value="{{$admin->program_name}}" class="form-control">
                                    <label class="form-label">Program Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                  <div class="form-line">
                                    <input type="text" name="program_url" id="program_url" class="form-control" value="{{$admin->program_url}}">
                                    <label class="form-label">Add Url</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                  <div class="form-line">
                                    <input type="text" name="length" id="length" class="form-control"  value="{{$admin->length}}">
                                    <label class="form-label">Length</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="tuition_canadian_students" id="tuition_canadian_students" class="form-control"  value="{{$admin->tuition_canadian_students}}">
                                    <label class="form-label">Canadian Students</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="tuition_international_students" id="tuition_international_students" class="form-control" value="{{$admin->tuition_international_students}}">
                                    <label class="form-label">International Students</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{route("admin.ads.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

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
