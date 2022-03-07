@extends('layouts.app')
@section('style')
    <style>
        h1, h2, h3, h4, h5, h6, label, p {
            text-transform: none !important;
        }
    </style>
@endsection
@section('content')



    <div class="container padding-y">
        <h1 class="text-center text-blue mb-2">What is this?</h1>
        <p class="font-weight-bold" style="line-height: 30px;">
            In case you are unable to find Canadian Exports through an organization close to you, you may want to join our  Info-Letter; you will receive every new issue via e-mail for free. We respect your privacy; we do not share your e-mail address with third parties nor will we send unsolicited mail. For additional information, view our Privacy Policy
        </p>
    </div>

    <div class="container padding-y">

        @if(session()->has("success"))
            <h1 class="alert alert-success text-center">
                {{session("success")}}
            </h1>
        @endif

        <form action="{{route("info-letter")}}" method="post">
            @csrf
            <h1 class="text-blue mb-2 text-center">Join Now</h1>
			<p class="astrik-note"><span>*</span> Indicates required fields</p>
            <div class="form-group">
				<label class="cus-label">Company name <span>*</span></label>
                <input type="text" class="form-control"  name="company_name" placeholder="Company name">
                @error('company_name')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
				<label class="cus-label">Your name and title <span>*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Your name and title">
                @error('name')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
				<label class="cus-label">Your e-mail <span>*</span></label>
                <input type="text" class="form-control" name="email" placeholder="Your e-mail">
                @error('email')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
				<label class="cus-label">Your country <span>*</span></label>
                <input type="text" class="form-control" name="country" placeholder="Your country">
                @error('country')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="row mt-3 align-items-center">
                <div class="col-sm-12">
					<div class="capcha-outer">
						@if(config('services.recaptcha.key'))
						<div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}">
						</div>
						@endif
						@if ($errors->has('g-recaptcha-response'))
						<span class="help-block">
							<small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>{{ $errors->first('g-recaptcha-response') }}
							</small>
						</span>
						@endif
					</div>
                </div>
                <div class="col-sm-12 submit-btn-setting">
					<button type="submit" class="btn btn-blue form-btn px-5">Submit</button>
				</div>
            </div>

        </form>
    </div>
@include("layouts.partial.ads_banner")
@include("layouts.partial.related_program")




@endsection
