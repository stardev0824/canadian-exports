@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <form method="POST" action="{{ route('password.email') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Send Password Reset Link') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="container padding-y">
    <h1 class="text-center text-blue pb-5">PASSWORD RECOVERY</h1>
    <div class="row d-flex justify-content-center align-items-center mb-5">
        <form class="col-sm-12 col-lg-6" method="POST" action="{{ route('password.email') }}">

            @csrf
            <div class="form-group">
                <label for="email" class="">Enter your email address</label>
                <input type="email" class="form-control @error("email")is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" aria-describedby="emailHelp"  placeholder="Enter email">

                @error('email')
                    <small id="emailHelp" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>{{$message}}</small>
                @enderror
                @if (session('status'))
                    <small id="emailHelp" class="form-text ml-3 text-success"><i class="fas fa-check mr-2"></i>{{session('status')}}</small>
                @endif
            </div>
            <div class="row d-flex align-items-center justify-content-end">
                <button type="submit" class="nav-link btn btn-blue mr-3">Send email</button>
            </div>
        </form>
    </div>



</div>
@endsection
