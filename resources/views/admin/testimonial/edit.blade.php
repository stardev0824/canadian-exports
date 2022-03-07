@extends("admin.layouts.app")

@section("title","Create New Testimonial")

@push("css")
    <!-- Bootstrap Select Css -->
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
                            Update Testimonial
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{route("admin.testimonial.update",$testimonial->id)}}" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" value="{{$testimonial->name}}" class="form-control">
                                    <label class="form-label">Name</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="place" id="place" value="{{$testimonial->place}}" class="form-control">
                                    <label class="form-label">Place</label>
                                </div>
                            </div>

                            <div class="form-line form-group">
                                <p>
                                    <b>Business Category</b>
                                </p>
                                <select class="form-control show-tick" name="category_id" data-live-search="true">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}"
                                            {{$category->id==$testimonial->category_id?"selected":""}}}
                                        >{{$category->name_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="form-group form-float">
                                <p>
                                    <b>Comment</b>
                                </p>
                                <div class="form-line">
                                    <textarea name="comment" id="comment"  rows="5" class="form-control">{{$testimonial->comment}}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <a href="{{route("admin.testimonial.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection

@push("js")

    <!-- Select Plugin Js -->
    <script src="{{asset("assets/back_end/plugins/bootstrap-select/js/bootstrap-select.js")}}"></script>
@endpush
