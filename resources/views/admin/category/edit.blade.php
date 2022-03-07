@extends("admin.layouts.app")

@section("title","edit category")

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
                            Update Category
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.category.update",$category->id)}}" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name_en" id="name_en" value="{{$category->name_en}}" class="form-control">
                                    <label class="form-label">Category name in English</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name_fr" id="name_fr" value="{{$category->name_fr}}" class="form-control">
                                    <label class="form-label">Category name in french</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{route("admin.category.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

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
