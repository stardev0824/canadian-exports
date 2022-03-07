@extends('layouts.app')

@section('content')

    <div class="container padding-y">

    {{--            ************************************************* 4 ********************************************--}}
    <h1 class="text-blue my-5">Business Profile</h1>
        @if(session()->has("success"))
        <h1 class="alert-success">{{session("success")}}</h1>
        @endif
        <form action="{{route("home.profile.update")}}" method="post">
            @csrf
            {{method_field("PUT")}}
    <div class="form-group">
        <label for="" class="pl-3 text-blue">
            Company Name *
        </label>
        <input type="text" class="form-control p-3  @error('company_name') invalid @endif" name="company_name" value="{{auth()->user()->profile()->company_name}}"  id="exampleInputEmail1" aria-describedby="name" placeholder="Company name *">
        @error('company_name')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
    </div>

    <div class="form-group">
        <label for="" class="pl-3 text-blue">
            Company Email *
        </label>
        <input type="text" class="form-control p-3  @error('company_email') invalid @endif" name="company_email" value="{{auth()->user()->profile()->company_email}}"  id="exampleInputEmail1" aria-describedby="email" placeholder="Company Email *">
        @error('company_email')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
    </div>


    <div class="form-group">
        <label for="" class="pl-3 text-blue">
            Mailing address with postal code and address
        </label>
        <textarea rows="3" class="form-control p-3 @error('address') invalid @endif" name="address" placeholder="Mailing address with postal code and address *">{{auth()->user()->profile()->address}}</textarea>
        @error('address')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
    </div>
    <div class="form-group">
        <label for="" class="pl-3 text-blue">
            Phone *
        </label>
        <input type="tel" class="form-control p-3 @error('phone') invalid @endif" name="phone" value="{{auth()->user()->profile()->phone}}" id="exampleInputPassword1" placeholder="Phone *">
        @error('phone')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
    </div>

        <div class="form-group">
            <label for="" class="pl-3 text-blue">
                Fax
            </label>
            <input type="tel" class="form-control p-3 @error('fax') invalid @endif" name="fax" value="{{auth()->user()->profile()->fax}}" id="exampleInputPassword1" placeholder="Fax *">
            @error('fax')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>
    <div class="form-group">
        <label for="" class="pl-3 text-blue">
            Website *
        </label>
        <input type="url" class="form-control p-3 @error('site') invalid @endif" name="site" value="{{auth()->user()->profile()->site}}" id="exampleInputPassword1" placeholder="Website *">
        @error('site')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
    </div>

        <div class="form-group">
            <label for="" class="pl-3 text-blue">
                TagLine *
            </label>
            <input type="text" class="form-control p-3 @error('tag_line') invalid @endif" name="tag_line" value="{{auth()->user()->profile()->tag_line}}" id="exampleInputPassword1" placeholder="TagLine *">
            @error('tag_line')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>

    <div class="form-group">
        <label for="" class="pl-3 text-blue">
            Short Business Description *
        </label>
        <textarea rows="3" class="form-control p-3 @error('short_description') invalid @endif" name="short_description" placeholder="Short Business Description *">{{auth()->user()->profile()->short_description}}</textarea>
        @error('short_description')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
    </div>

    <div class="form-group">
        <label for="" class="pl-3 text-blue">
            Detailed Business Description *
        </label>
        <textarea rows="3" class="form-control p-3 @error('description') invalid @endif" name="description" placeholder="Detailed Business Description *">{{auth()->user()->profile()->description}}</textarea>
        @error('description')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
    </div>

    <div class="form-group">
        <label for="" class="pl-3 text-blue">
            Keywords : separated with commas *
        </label>

        <textarea rows="3" class="form-control p-3 @error('key_word') invalid @endif" name="key_word" placeholder="Keywords : separated with commas *">{{auth()->user()->profile()->key_word}}</textarea>
        @error('key_word')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
    </div>

        <div class="row d-flex justify-content-end mt-5 mr-1">
            <button type="submit" class="btn btn-blue form-btn px-5">Proceed</button>
        </div>
        </form>
    </div>
@endsection
