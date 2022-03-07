@extends("admin.auth.template")

@section("content")
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin <b>CEX</b></a>
        <small>Canadian Exports - Admin Login</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" action="{{route("admin.login")}}" method="POST">
                @csrf
                <div class="msg">Sign in to start your session</div>

                <div class="msg ">
                    @if(session()->has("success"))
                        <p class="text-success text-center">
                            {{session("success")}}
                        </p>
                    @endif

                </div>

                <div class="msg ">
                    @if(session()->has("error"))
                        <p class="text-danger text-center">
                            {{session("error")}}
                        </p>
                    @endif

                </div>

                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required autofocus>
                    </div>
                    @error('email')
                        <label id="email-error" class="error" for="email">{{$message}}</label>
                    @enderror
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="remember_me" id="rememberme"  class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="{{aurl("forgot/password")}}">Forgot Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
