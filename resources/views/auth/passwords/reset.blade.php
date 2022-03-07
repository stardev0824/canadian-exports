@extends('layouts.app')

@section('content')

<div class="container padding-y">
    <h1 class="text-center text-blue pb-5">Reset password</h1>
    <div class="row d-flex justify-content-center align-items-center mb-5">
        <form class="col-sm-12 col-lg-6" method="POST" action="{{ route('password.update') }}">

            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <label for="email" class="ml-3">Enter your email address</label>
                <input type="email" class="form-control @error("email")is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus id="email" aria-describedby="emailHelp"  placeholder="Enter email">

                @error('email')
                <small id="emailHelp" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="ml-3">Enter your new password</label>
                <input type="password" class="form-control @error("password")is-invalid @enderror" name="password" required autocomplete="password" autofocus id="password" aria-describedby="emailHelp"  placeholder="Enter new password">

                @error('password')
                <small id="emailHelp" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>{{$message}}</small>
                @enderror

            </div>
            <div class="form-group">
                <label for="email" class="ml-3">Confirm Password</label>
                <input type="password" class="form-control @error("password_confirmation")is-invalid @enderror" name="password_confirmation"  required autocomplete="email" autofocus id="email" aria-describedby="emailHelp"  placeholder="Confirm Password">

            </div>
            <div class="row d-flex align-items-center justify-content-end">
                <button type="submit" class="nav-link btn btn-blue mr-3">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
