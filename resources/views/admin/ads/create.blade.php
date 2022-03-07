@extends("admin.layouts.app")

@section("title","Create New Admin")

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
                            Create Ads
                        </h2>
{{--                        <ul class="header-dropdown m-r--5">--}}
{{--                            <li class="dropdown">--}}
{{--                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="material-icons">more_vert</i>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu pull-right">--}}
{{--                                    <li><a href="javascript:void(0);">Action</a></li>--}}
{{--                                    <li><a href="javascript:void(0);">Another action</a></li>--}}
{{--                                    <li><a href="javascript:void(0);">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                    <div class="body">
                        <form action="{{route("admin.ads.store")}}" method="post">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="program_name" id="program_name" class="form-control">
                                    <label class="form-label">Program Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                  <div class="form-line">
                                    <input type="text" name="url" id="url" class="form-control">
                                    <label class="form-label">Add Url</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                  <div class="form-line">
                                    <input type="text" name="length" id="length" class="form-control">
                                    <label class="form-label">Length</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="tuition_canadian_students" id="tuition_canadian_students" class="form-control">
                                    <label class="form-label">Canadian Students</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="tuition_international_students" id="tuition_international_students" class="form-control">
                                    <label class="form-label">International Students</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
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
