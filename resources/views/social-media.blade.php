@extends('layouts.app')

@section('content')

    <div class="container padding-y">

    {{--            ************************************************* 4 ********************************************--}}
        <h1 class="text-blue my-5">Social-Media</h1>
        @if(session()->has("success"))
            <h1 class="alert-success">{{session("success")}}</h1>
        @endif
        <form action="{{route("home.social-media.update")}}" method="post">
            @csrf
            {{method_field("PUT")}}
            <div class="form-group">
                <label for="facebook" class="text-blue pl-2">Facebook</label>
                <input type="text" class="form-control p-3" name="facebook" id="facebook" value="{{auth_profile()->social_media()->get()->first()->facebook}}" placeholder="Facebook">
                @error('facebook')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="twitter" class="text-blue pl-2">Twitter</label>
                <input type="text" class="form-control p-3" name="twitter" value="{{auth_profile()->social_media()->get()->first()->twitter}}"  id="twitter" aria-describedby="emailHelp" placeholder="Twitter">
                @error('twitter')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="youtube" class="text-blue pl-2">Youtube</label>
                <input type="text" class="form-control p-3" name="youtube" value="{{auth_profile()->social_media()->get()->first()->youtube}}"   id="youtube" placeholder="YouTube">
                @error('youtube')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="linked_in" class="text-blue pl-2">LinkedIn</label>
                <input type="text" class="form-control p-3" name="linked_in"  id="linked_in" value="{{auth_profile()->social_media()->get()->first()->linked_in}}"  placeholder="LinkedIn">
                @error('linked_in')
                <small id="invalid-pw"  class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="google" class="text-blue pl-2">GooglePlus</label>
                <input type="text" class="form-control p-3" value="{{auth_profile()->social_media()->get()->first()->google}}" name="google"  id="google" placeholder="GooglePlus">
                @error('google')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="row d-flex justify-content-end mt-5 mr-1">
                <button type="submit" class="btn btn-blue form-btn px-5">Update</button>
            </div>
        </form>
    </div>
@endsection
