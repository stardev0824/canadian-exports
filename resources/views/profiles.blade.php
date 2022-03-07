@extends('layouts.app')

@section('content')

    <div class="container padding-y all-profile-listing">
        <h1 class="text-center text-blue pb-5">Premium Listings in ({{$category->name_en}})</h1>
        @foreach($profiles as $profile)
        <div class="row d-flex align-items-center profile-list-wrap">
            <div class="col-lg-3 d-flex justify-content-center">
                <a href="{{url("profile/".$profile->id)}}"><img src="{{isset($profile->media()->get()->first()->logo)?asset("storage/".$profile->media()->get()->first()->logo):asset("assets/front_end/images/default.jpeg")}}" class="img-fluid"></a>
            </div>
            <div class="col-lg-9 sp-15">
                <h4 class="text-blue font"><a href="{{url("profile/".$profile->id)}}"> {{$profile->company_name}} </a></h4>
                <p>
                    {!!   strlen($profile->short_description)>0?$profile->short_description:str_truncate($profile->description,20)!!}
                </p>
                <div class="btn btn-blue">
                    <a href="{{url("profile/".$profile->id)}}" class="form-btn text-light">View Company's Profile</a>
                </div>
            </div>
        </div>
            <hr class="w-100 clearfix d-md-none my-5">
        @endforeach

         <div class="row d-flex justify-content-center mt-5">
              {{$profiles->links()}}
         </div>
    </div>


@endsection
