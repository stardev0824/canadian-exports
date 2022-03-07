@extends('layouts.app')
@section('style')
    <style>
        h1, h2, h3, h4, h5, h6, label, p {
            text-transform: none !important;
        }
    </style>
@endsection
@section('content')

@extends('layouts.sendgrid')
    <div class="container padding-y">
        <h1 class="text-center text-blue mb-2">Contact us</h1>
        @if(session()->has("success"))
        <h3 class="alert alert-success text-center">
            {!! session("success") !!}
        </h3>
        @endif

        <p class="font-weight-bold text-center" style="line-height: 30px;">
            We communicate with over 100 countries. So please write to us in English. Thank you for understanding and sorry for inconvenience
        </p>
		<div class="row">
			<div class="col-sm-7">
				<div class="my-2 contact-flex">
					<h5 class="text-blue">Mailing address:</h5>
					<p class="text-justify" style="line-height: 30px;">
						1051 Blvd Decarie,
						P. O. Box: 53555 NORGATE,
						Montreal - Qc.
						Canada
						Postal Code: H4L 3M0
					</p>
				</div>
				<div class="mb-2 contact-flex">
					<h5 class="text-blue">Toll free:</h5>
					<p class="text-justify" style="line-height: 30px;">
						1-877-333-3014 (Toll-Free within Canada and USA)
					</p>
				</div>
				<div class="mb-2 contact-flex">
					<h5 class="text-blue">Telephone:</h5>
					<p class="text-justify" style="line-height: 30px;">
						+1-514-557-7856 (From the rest of the world)
					</p>
				</div>
				<div class="mb-2 contact-flex">
					<h5 class="text-blue">Fax:</h5>
					<p class="text-justify" style="line-height: 30px;">
						+1-514-333-4979
					</p>
				</div>
				<div class="mb-2 contact-flex">
					<h5 class="text-blue">e-mail:</h5>
					<p class="text-justify" style="line-height: 30px;">
                        <!-- info@canadianexports.org -->info@canadianexports.org
					</p>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="my-2 contact-flex">
					<h5 class="text-blue">Website:</h5>
					<p class="text-justify" style="line-height: 30px; text-transform: none !important;">
						www.canadianexports.org
					</p>
				</div>
				<div class="mb-2 contact-flex">
					<h5 class="text-blue">General inquiries:</h5>
					<p class="text-justify" style="line-height: 30px;">
						info@canadianexports.org
					</p>
				</div>
				<div class="mb-2 contact-flex">
					<h5 class="text-blue">Sales department:</h5>
					<p class="text-justify" style="line-height: 30px;">
						sales@canadianexports.org
					</p>
				</div>
				<div class="mb-2 contact-flex">
					<h5 class="text-blue">Jobs at Canadian Exports:</h5>
					<p class="" style="line-height: 30px;">
						employment@canadianexports.org
					</p>
				</div>
				<div class="contact-flex">
					<h5 class="text-blue">Office hours:</h5>
					<p class="text-justify" style="line-height: 30px;">
						Monday - Friday 9:30 AM - 4:00 PM (EST)
					</p>
				</div>
			</div>
		</div>




    </div>



    <div class="container padding-y">
        <form method="post" action="{{route('contact-us')}}">
            @csrf
            <h1 class="text-blue mb-2 text-center">Get in touch</h1>
			<p class="astrik-note"><span>*</span> Indicates required fields</p>
            <div class="form-group">
				<label class="cus-label">Your name <span>*</span></label>
                <input type="text" class="form-control @error("name") invalid @enderror " value="{{old("name")}}" name="name" placeholder="Your name">
                @error('name')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
				<label class="cus-label">Your e-mail <span>*</span></label>
                <input type="email" class="form-control @error("email") invalid @enderror " value="{{old("email")}}" name="email" placeholder="Your e-mail">
                @error('email')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
				<label class="cus-label">Your message <span>*</span></label>
                <textarea rows="3" class="form-control @error("message") invalid @enderror " name="message"  placeholder="Your message"></textarea>
                @error('message')
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
					<button type="submit" class="btn btn-blue form-btn px-5 " style="font-size: 18px;">Submit</button>
				</div>
            </div>

        </form>
    </div>


	<br><br>

    <!-- hr width="60%" class="mt-3 mb-2" -->

@endsection
