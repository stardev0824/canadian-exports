@extends("admin.layouts.app")

@section("title","Create New Profile")

@push("css")
    <!-- Bootstrap Select Css -->
    <link href="{{asset("assets/back_end/plugins/bootstrap-select/css/bootstrap-select.css")}}" rel="stylesheet" />

@endpush

@section("content")
    <div class="container-fluid">

        <!-- Tabs With Icon Title -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">settings</i> PROFILE (required)
                                </a>
                            </li>

                            <li role="presentation">
                                <a href="#categories_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">done_all</i> Categories (required)
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#profile_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">face</i> Media (optional)
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#messages_with_icon_title" data-toggle="tab">
                                    <i class="material-icons">email</i> Social-Media (optional)
                                </a>
                            </li>

                        </ul>
                        <form action="{{route("admin.profile.store")}}" method="post" enctype="multipart/form-data">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                <b class="red">Profile inputs (* => required input)</b>
                                <br><br>
                                        @csrf
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="company_name" id="company_name"  value="{{old("company_name")}}"class="form-control" required>
                                                <label class="form-label">Company Name *</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="email" name="company_email" id="company_email" value="{{old("company_email")}}" class="form-control" required>
                                                <label class="form-label">Company Email *</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="url" name="site" id="site" value="{{old("site")}}" class="form-control" required>
                                                <label class="form-label">WebSite *</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="phone" id="phone"  value="{{old("phone")}}"class="form-control" required>
                                                <label class="form-label">Company Phone *</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="fax" id="fax"  value="{{old("fax")}}"class="form-control">
                                                <label class="form-label">Company fax</label>
                                            </div>
                                        </div>


                                        <div class="form-group form-float">
                                            <p>
                                                <b>Short Description *</b>
                                            </p>
                                            <div class="form-line">
                                                <textarea name="short_description" id="short_description"  rows="2" class="form-control" required>{{old("short_description")}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <p>
                                                <b> Description *</b>
                                            </p>
                                            <div class="form-line">
                                                <textarea name="description" id="description"  rows="2" class="form-control" required>{{old("description")}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <p>
                                                <b> Mailing Address *</b>
                                            </p>
                                            <div class="form-line">
                                                <textarea name="address" id="address"  rows="2" class="form-control" required>{{old("address")}}</textarea>
                                            </div>
                                        </div>



                                        <div class="form-group form-float">
                                            <p>
                                                <b> KeyWord *</b>
                                            </p>
                                            <div class="form-line">
                                                <textarea name="key_word" id="key_word"  rows="2" class="form-control" required>{{old("key_word")}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <p>
                                                <b> TagLine *</b>
                                            </p>
                                            <div class="form-line">
                                                <textarea name="tag_line" id="tag_line"  rows="2" class="form-control">{{old("tag_line")}}</textarea>
                                            </div>
                                        </div>


                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                <b>Media Content</b>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="">Logo </label>

                                        <input type="file" name="logo" id="logo"  value="{{old("logo")}}"class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="url" name="video" id="video" value="{{old("video")}}" class="form-control" >
                                        <label class="form-label">Welcome Video </label>
                                    </div>
                                </div>

                                <div class="form-group form-float">

                                    <div class="form-line">

                                        <label class="">Image 1 </label>
                                        <input type="file" name="image_1" id="image_1" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <div class="form-line">

                                        <label class="">Image 2 </label>
                                        <input type="file" name="image_2" id="image_2"  class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <div class="form-line">

                                        <label class="">Image 3 </label>
                                        <input type="file" name="image_3" id="image_3"  class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <div class="form-line">

                                        <label class="">Image 4 </label>
                                        <input type="file" name="image_4" id="image_4"  class="form-control" >
                                    </div>
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                <b>Social-Media</b>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="url" name="facebook" id="facebook" value="{{old("facebook")}}" class="form-control" >
                                        <label class="form-label">facebook </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="url" name="twitter" id="twitter" value="{{old("twitter")}}" class="form-control" >
                                        <label class="form-label">twitter </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="url" name="google" id="google" value="{{old("google")}}" class="form-control" >
                                        <label class="form-label">google plus *</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="url" name="youtube" id="youtube" value="{{old("youtube")}}" class="form-control" >
                                        <label class="form-label">youtube</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="url" name="linked_in" id="linked_in" value="{{old("linked_in")}}" class="form-control" >
                                        <label class="form-label">linkedIn</label>
                                    </div>
                                </div>

                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="categories_with_icon_title">
                                <b>Message Content</b>
                                <br><br>
                                <div class="demo-checkbox">
                                    @foreach(getAllCategories() as $category)
                                        <span class="col-md-4">
                                            <input type="checkbox" id="{{$category->id}}" value="{{$category->id}}" name="categories" />
                                            <label for="{{$category->id}}">{{$category->name_en}}</label>
                                        </span>

                                    @endforeach
                                </div>
                            </div>

                        </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create Profile</button>
                            <a href="{{route("admin.profile.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push("js")

    <!-- Select Plugin Js -->
    <script src="{{asset("assets/back_end/plugins/bootstrap-select/js/bootstrap-select.js")}}"></script>

@endpush
