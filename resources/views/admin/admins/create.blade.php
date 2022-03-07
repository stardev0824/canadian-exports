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
                            Create New Admin
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
                        <form action="{{route("admin.admins-account.store")}}" method="post">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" class="form-control">
                                    <label class="form-label">Admin Name</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                  <div class="form-line">
                                    <input type="email" name="email" id="email" class="form-control">
                                    <label class="form-label">Admin Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" name="password" id="password" class="form-control">
                                    <label class="form-label">Password</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" name="password_confirmation" id="password-confirmation" class="form-control">
                                    <label class="form-label">Password Confirmation</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create Admin</button>
                            <a href="{{route("admin.admins-account.index")}}" class="btn btn-danger m-t-15 waves-effect">Back</a>

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
