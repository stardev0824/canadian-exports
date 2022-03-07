@extends('layouts.app')

@section('content')



    <div class="container padding-y">
        <h1 class="text-center text-blue pb-5">All Canadian Exports Magazines</h1>
        <div class="row d-flex justify-content">
            @foreach(getAllIssues() as $issue)
                <div class="col-lg-4 p-3">
                    <div class="itb container-fluid">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 p-0 img-itb text-center">
{{--                                <h1 class="text-blue my-2">{{$issue->title}}</h1>--}}

                                <img src="{{asset("storage/".$issue->front_image)}}" class="mt-4" height="150px">
                                <a href="{{asset("storage/".$issue->pdf)}}">
                                    <p class="font text-blue mt-3">Download</p>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach


        </div>

    </div>

    <div class="container padding-y">

        <div class="row d-flex justify-content-center mt-5">
            {{getAllIssues()->links()}}
        </div>
    </div>
@endsection
