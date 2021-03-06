@extends('layouts.app')

@section('content')

    <div class="container padding-y">
        <h1 class="text-center text-blue mb-5">Sitemap</h1>
        <div class="row">
        <div class="col-4">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item disabled">Canadian Exports</li>
			  <li class="list-group-item"><a href="#">Home</a></li>
			  <li class="list-group-item"><a href="#">About us</a></li>
			  <li class="list-group-item"><a href="#">Contact us</a></li>
			</ul>
					
			</div>
			<div class="col-4">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item disabled">For Companies</li>
			  <li class="list-group-item"><a href="#">Registration</a></li>
			  <li class="list-group-item"><a href="#">How the Business Categories came about</a></li>
			  <li class="list-group-item"><a href="#">Inquiries to Buy</a></li>
			  <li class="list-group-item"><a href="#">Scam Alerts</a></li>
			</ul>
					
			</div> 
			<div class="col-4">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item disabled">Other Resources</li>
			  <li class="list-group-item"><a href="#">Success Stories</a></li>
			  <li class="list-group-item"><a href="#">Testimonials</a></li>
			  <li class="list-group-item"><a href="#">Info-Letter</a></li>
			  <li class="list-group-item"><a href="#">Resources</a></li>
			</ul>
					
			</div>        
                
        
        </div>
    </div>


    <div class="container padding-y my-5 px-0">

        @foreach(getAllTestimonies() as $test)
        <div class="testimonial px-3 py-2">
            <h5 class="text-blue">Business Category : {{$test->category()->name_en}}</h5>
            <h5 class="text-blue">{{$test->place}}</h5>
            <p class="font-weight-bold text-justify">
                {{$test->comment}}
            </p>
            <h5 class="text-blue text-right">{{$test->name}}</h5>
        </div>
            <br>
        @endforeach
            <div class="row d-flex justify-content-center mt-5">
                {{getAllTestimonies()->links()}}
            </div>

    </div>


@endsection
