@extends("admin.layouts.app")

@section("title","Create New Ads Banner")

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
                            Create New Ads Banner
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.ads_banner.store")}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="url" name="url" id="url" class="form-control" value="{{ old('url') }}">
                                    <label class="form-label">Url</label>
                                     @if ($errors->has('url'))
                            <span id="url" class="error text-danger" for="url">{{ $errors->first('url') }}</span>
                            @endif
                                </div>
                            </div>


                            <div class="form-line form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control-file" id="image" accept="image/x-png,image/jpeg">
                               @if ($errors->has('image'))
                            <span id="name-error" class="error text-danger" for="image">{{ $errors->first('image') }}</span>
                            @endif
                            </div>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                            <a href="{{route("admin.ads_banner.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

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
