@extends("admin.layouts.app")

@section("title","Create New Banner or Sponsor")

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
                            Create New Banner or Sponsor
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.banners_and_sponsors.store")}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="url" name="url" id="url" class="form-control">
                                    <label class="form-label">Url</label>
                                </div>
                            </div>

                            <div class="form-line form-group">
                                <p>
                                    <b>Type</b>
                                </p>
                                <select class="form-control show-tick" name="type" data-live-search="true">
                                    <option  value="banner">Banner</option>
                                    <option  value="sponsor">Sponsor</option>
                                </select>
                            </div>

                            <div class="form-line form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control-file" id="image">
                            </div>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create Category</button>
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
