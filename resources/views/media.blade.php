@extends('layouts.app')

@section('content')

    <div class="container padding-y">

    {{--            ************************************************* 4 ********************************************--}}
    <h1 class="text-blue my-5">Media</h1>
        @if(session()->has("success"))
            <h1 class="text-center alert alert-success">{{session("success")}}</h1>
        @endif
        <form action="{{route("home.media.update")}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field("PUT")}}


            <div class="form-group">
                <label for="logo" class="text-blue">Logo (Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg)</label>
                <input type="file" class="form-control-file" name="logo" id="logo">
                @error('logo')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group">
                <label for="url" class="mt-3 text-blue" >Welcome Video </label>
                <input type="url"  placeholder="Enter the YouTube URL. Valid URL formats must include https://www.youtube.com" name="video" class="form-control-file" id="url">
                @error('video')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_1" class="mt-3 text-blue">Image 1 (Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg)</label>
                <input type="file" name="image_1" class="form-control-file" id="image_1">
                @error('image_1')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group text-blue">
                <label for="image_2" class="mt-3">Image 2 (Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg)</label>
                <input type="file" name="image_2" class="form-control-file" id="image_2">
                @error('image_2')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_3" class="mt-3 text-blue">Image 3 (Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg)</label>
                <input type="file" name="image_3" class="form-control-file" id="image_3">
                @error('image_3')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_4" class="mt-3 text-blue">Image 4 Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg</label>
                <input type="file" name="image_4" class="form-control-file" id="image_4">
                @error('image_4')
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
