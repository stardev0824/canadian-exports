@extends("layouts.app")

@section("content")
    <div class="container padding-y">
        @if(session()->has("success"))
            <h1 class="text-center alert alert-success">
                {{session("success")}}
            </h1>
        @endif

        <h1 class="text-center text-blue mb-5">Account Settings</h1>
        <div class="my-5">
            <h5 class="text-blue mb-4">Personal Informations:</h5>
            <form action="{{route("user.update-account")}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}" placeholder="Name *" required>
                    @error('name')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}" required aria-describedby="emailHelp" placeholder="E-mail address *">
                    @error('email')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="row d-flex justify-content-end mt-5 ">
                    <button type="submit" class="btn btn-blue form-btn px-5 mr-3">Upgrade</button>
                </div>
            </form>
        </div>

        <hr width="80%" class="mt-3 mb-5">

        <div class="mb-5">
            <h5 class="text-blue mb-4">Account Informations:</h5>
            <p class="text-justify" style="line-height: 30px;">
                Account Type : {!!  auth()->user()->expired_at>now()?"<span>Premium</span>.":"<span>Free</span>."!!}
            </p>
            <p class="text-justify" style="line-height: 30px;">
                Subscription Package : {!!  auth()->user()->expired_at>now()?"<span>".auth()->user()->package_description."</span>.":"<span>Free</span>."!!}
            </p>
            @if(isset(auth()->user()->expired_at))
                <p class="text-justify" style="line-height: 30px;">
                    Expired At : <span>{{ \Carbon\Carbon::parse(auth()->user()->expired_at)->format('m/d/Y')}}</span>
                </p>
            @endif
            <div class="row d-flex justify-content-end mt-5 ">
                <button type="submit" data-toggle="modal" data-target="#upgrade-acc-type" class="btn btn-blue form-btn px-5 mr-3">Upgrade</button>
            </div>
        </div>

    </div>

    <!-- Modal upgrade account type Start-->
    <div class="modal fade" id="upgrade-acc-type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-blue" id="exampleModalLabel">Upgrade account type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("user.register-revive")}}" method="post">
                        <div class="form-group">
                            @csrf
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="package"  value="one" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    One months subscription - $6.99*
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="package"  value="two">
                                <label class="form-check-label" for="exampleRadios2">
                                    Three months subscription - $13.98* (one months free)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="package"  value="three">
                                <label class="form-check-label" for="exampleRadios3">
                                    One year subscription - $55.92* (four months free)
                                </label>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-blue font mr-3">Back</button>
                            <button type="submit" class="btn btn-blue font mr-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
