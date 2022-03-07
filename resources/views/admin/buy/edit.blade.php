@extends("admin.layouts.app")

@section("title","edit category")

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
                            Update Item
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.buy.update",$buy->id)}}" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" value="{{$buy->name}}" class="form-control">
                                    <label class="form-label">Item Name</label>
                                </div>
                            </div>

                            <div class="form-line form-group">
                                <p>
                                    <b>Business Category</b>
                                </p>
                                <select class="form-control show-tick" name="category" data-live-search="true">
                                    @foreach(getAllCategories() as $category)
                                        <option  value="{{$category->name_en}}" {{$category->name_en==$buy->category?"selected":""}}>
                                            {{$category->name_en}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="country" id="country" value="{{$buy->country}}" class="form-control">
                                    <label class="form-label">Country</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="value" id="value" value="{{$buy->value}}" class="form-control">
                                    <label class="form-label">Estimated Value</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="dead_line" id="dead_line" value="{{$buy->dead_line}}" class="form-control">
                                    <label class="form-label">DeadLine</label>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{route("admin.buy.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

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
