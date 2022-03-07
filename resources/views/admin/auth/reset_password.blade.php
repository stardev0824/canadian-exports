@extends("admin.auth.template")

@section("content")
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" action="{{route("admin.reset_password",$data->token)}}">
                    @csrf
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>

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

                            <input type="hidden"  class="form-control" id="email" value="{{$data->email}}" name="email"  required autofocus>


                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Password" required autofocus>
                        </div>
                        @error('password')
                        <label id="email-error" class="error" for="password">{{$message}}</label>
                        @enderror
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="Password Confirmation" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{aurl("login")}}">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
