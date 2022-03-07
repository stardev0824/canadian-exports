@extends('layouts.app')

@section('content')

    <div class="container padding-y">
        <h1 class="text-center text-blue mb-5">Sitemap</h1>
        <div class="row">
        <div class="col-4">
				<?php
				print_r($_POST);
				
				?>
				<div class="row d-flex justify-content-end mt-5 mr-1">
            	<a href="{{ URL::previous() }}" class="btn btn-blue form-btn px-5" onclick="">Back</a>
            	<button type="submit" class="btn btn-blue form-btn px-5">Checkout</button>
       		</div>
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
