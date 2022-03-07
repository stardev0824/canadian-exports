@extends("admin.layouts.app")

@section("title","Create New Profile")

@push("css")
    <!-- Bootstrap Select Css -->
    <link href="{{asset("assets/back_end/plugins/bootstrap-select/css/bootstrap-select.css")}}" rel="stylesheet" />

@endpush

@section("content")
    <div class="container-fluid">


        <div class="block-header">
            <h2>
                <a href="{{route("admin.profile.index")}}" class="btn btn-default waves-effect">
                    <i class="material-icons">assignment_return</i>
                    <span>Back</span>
                </a>

                <a href="{{route("admin.profile.create")}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create new profile</span>
                </a>

                <a href="{{route("admin.profile.edit",$profile->id)}}" class="btn btn-warning waves-effect">
                    <i class="material-icons">edit</i>
                    <span>Edit this profile</span>
                </a>

                <button class="btn btn-danger waves-effect"  type="button" onclick="deleteTag({{$profile->id}})">
                    <i class="material-icons ">delete</i>
                    <span>Delete this profile</span>
                </button>

                <form action="{{route("admin.profile.destroy",$profile->id)}} "
                      method="post" style="display: none"
                      id="delete-form-{{$profile->id}}">
                    @csrf
                    @method("delete")
                </form>
            </h2>
        </div>
        <div class="row clearfix">


            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                <!-- Blockquotes -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                     Company Name :   {{$profile->company_name}}
                                </h2>
                            </div>
                            <div class="body">
                                <blockquote>
                                    <p>Company Phone.</p>
                                    <footer>{{$profile->phone}}</footer>
                                </blockquote>
                                @if(isset($profile->fax))
                                <blockquote>
                                    <p>Company fax.</p>
                                    <footer>{{$profile->fax}}</footer>
                                </blockquote>
                                @endif
                                <blockquote>
                                    <p>WebSite.</p>
                                    <footer>{{$profile->site}}</footer>
                                </blockquote>
                                @if(isset($profile->tag_line))
                                <blockquote>
                                    <p>TagLine.</p>
                                    <footer>{{$profile->tag_line}}</footer>
                                </blockquote>
                                @endif


                                <blockquote class="blockquote-reverse">
                                    <p>Company Email.</p>
                                    <footer>{{$profile->company_email}}</footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Blockquotes -->
                <div class="panel-group" id="profile_info" role="tablist" aria-multiselectable="true">

            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingOne_1">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                            Mailing Address
                        </a>
                    </h4>
                </div>
                <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                    <div class="panel-body">
                      {{$profile->address}}
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingTwo_1">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false"
                           aria-controls="collapseTwo_1">
                            Short Description
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
                    <div class="panel-body">
                       {{$profile->short_description}}
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingThree_1">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseThree_1" aria-expanded="false"
                           aria-controls="collapseThree_1">
                           Description
                        </a>
                    </h4>
                </div>
                <div id="collapseThree_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1">
                    <div class="panel-body">
                       {{$profile->description}}
                    </div>
                </div>
            </div>
        </div>

                <!-- Blockquotes -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Social Media
                                </h2>
                            </div>
                            <div class="body">
                                <h4>Facebook</h4>
                                <p class="m-b-30">
                                    {{isset($profile->social_media()->get()->first()->facebook)?$profile->social_media()->get()->first()->facebook:"Facebook Not Found"}}
                                </p>

                                <h4>Twitter</h4>
                                <p class="m-b-30">
                                    {{isset($profile->social_media()->get()->first()->twitter)?$profile->social_media()->get()->first()->twitter:"Twitter Not Found"}}
                                </p>

                                <h4>GooglePlus</h4>
                                <p class="m-b-30">
                                    {{isset($profile->social_media()->get()->first()->google)?$profile->social_media()->get()->first()->google:"GooglePlus Not Found"}}
                                </p>

                                <h4>LinkedIn</h4>
                                <p class="m-b-30">
                                    {{isset($profile->social_media()->get()->first()->linked_in)?$profile->social_media()->get()->first()->linked_in:"LinkedIn Not Found"}}
                                </p>

                                <h4>Youtube</h4>
                                <p class="m-b-30">
                                    {{isset($profile->social_media()->get()->first()->youtube)?$profile->social_media()->get()->first()->youtube:"Youtube Not Found"}}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Blockquotes -->
            </div>
        </div>
        <!-- Custom Content -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Media
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <h1></h1>
                            <div class="col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <img src="{{isset($profile->media()->get()->first()->logo)?asset("storage/".$profile->media()->get()->first()->logo): "http://placehold.it/500x300"}}">
                                    <div class="caption">
                                        <h3 class="text-center">Logo</h3>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <img src="{{isset($profile->media()->get()->first()->image_1)?asset("storage/".$profile->media()->get()->first()->image_1): "http://placehold.it/500x300"}}">
                                    <div class="caption">
                                        <h3>Image 1</h3>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <img src="{{isset($profile->media()->get()->first()->image_2)?asset("storage/".$profile->media()->get()->first()->image_2): "http://placehold.it/500x300"}}">
                                    <div class="caption">
                                        <h3>Image 2</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <img src="{{isset($profile->media()->get()->first()->image_3)?asset("storage/".$profile->media()->get()->first()->image_3): "http://placehold.it/500x300"}}">
                                    <div class="caption">
                                        <h3>Image 3</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <img src="{{isset($profile->media()->get()->first()->image_4)?asset("storage/".$profile->media()->get()->first()->image_4): "http://placehold.it/500x300"}}">
                                    <div class="caption">
                                        <h3>Image 4</h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push("js")

    <!-- Select Plugin Js -->
    <script src="{{asset("assets/back_end/plugins/bootstrap-select/js/bootstrap-select.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        const deleteTag=id=>{
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById("delete-form-"+id).submit();
                }
            })
        }
    </script>

@endpush
