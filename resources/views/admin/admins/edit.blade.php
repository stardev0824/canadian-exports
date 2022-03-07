@extends("admin.layouts.app")

@section("title","edit Account")

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
                            Edit Account
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route("admin.admins-account.update",$admin->id)}}" method="post">
                            @csrf
                            {{method_field("PUT")}}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="name" id="name" value="{{$admin->name}}" class="form-control" required>
                                    <label class="form-label">Admin Name</label>
                                </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" name="email" id="email" value="{{$admin->email}}"  class="form-control" required>
                                    <label class="form-label">Admin Email</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" name="password" id="password" class="form-control" >
                                    <label class="form-label">Password</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
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
