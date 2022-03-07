@extends("admin.layouts.app")

@section("title","edit Banner Or Sponsors")

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
                            Update {{ucwords($bs->type)}}
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.banners_and_sponsors.update",$bs->id)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="url" id="url" value="{{$bs->url}}" class="form-control">
                                    <label class="form-label">LinkUrl</label>
                                </div>
                            </div>

                            <div class="form-line form-group">
                                <p>
                                    <b>Type</b>
                                </p>
                                <select class="form-control show-tick" name="type" data-live-search="true">
                                        <option  value="banner" {{$bs->type=='banner'?"selected":''}}>Banner</option>
                                        <option  value="sponsor" {{$bs->type=='sponsor'?"selected":''}}>Sponsor</option>
                                </select>
                            </div>

                            <div class="form-line form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control-file" id="image">
                            </div>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{route("admin.banners_and_sponsors.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

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
