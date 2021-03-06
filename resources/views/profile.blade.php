@extends("layouts.app")

@section("content")
    <div class="container padding-y">
        @if(session()->has("success"))
        <h1 class="text-center alert alert-success">
            {{session("success")}}
        </h1>
        @endif
        <div class="d-flex justify-content-center align-items-center my-5">
            <div class="mx-2">
                <img src="{{isset($profile->media()->logo)?asset("storage/".$profile->media()->logo):asset("assets/front_end/images/default.jpeg")}}" height="80">
            </div>
            <div>
                <h1 class="text-blue">{{$profile->company_name}}</h1>
                <!-- <h3 class="font">{{$profile->tag_line??"tagLine Not Found" }}</h3> -->
                <h3 class="font">{{$profile->tag_line}}</h3>
            </div>
        </div>


        

<!-- 
<hr class="my-5" width="90%">
<ul class="nav nav-tabs">
    <li class="btn active"><a data-toggle="tab" href="#home">Overview</a></li>
    <li class="btn"><a data-toggle="tab" href="#menu1">Media</a></li>
    <li class="btn"><a data-toggle="tab" href="#menu2">Contact</a></li>
  </ul>
 -->
 <style type="text/css">
  #myTab li a { border-color: #fff; border-top-left-radius: 6px; border-top-right-radius: 6px; background-color:#eee; }

 </style>
<ul class="nav nav-tabs" id="myTab">
  <li><a class="nav-link active" data-toggle="tab" href="#home">Overview</a></li>
  <li><a class="nav-link" data-toggle="tab" href="#media">Media</a></li>
  <li><a class="nav-link" data-toggle="tab"  href="#contact">Contact</a></li>
</ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active show">
      <div class="row d-flex justify-content-between mt-4">
            <div class="col-lg-6 pb-3 text-justify">                
                <p>{!!$profile->description!!}</p>
            </div>
            <div class="col-lg-6 pb-3 text-justify">
            	<p >
                    {!! isset($profile->media()->get()->first()->video) ? $profile->media()->get()->first()->video:'<iframe width="100%"  src="https://www.youtube.com/embed/Wdezk8nmt7Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'!!}
                </p>
            	<h4 class="font text-center mb-4"><a href="{!! $profile->site !!}" class="text-blue">Visit This Company's Website</a></h4>
	         </div>
        </div>
    </div>
    <div id="media" class="tab-pane fade mt-4">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="contact" class="tab-pane fade">
      	
      	<div class="row">
      		<div class="col-lg-6 pb-5  mt-4">
      		<form action="{{route("company-contact",$profile->company_email)}}" method="post">
                    @csrf
					<p class="astrik-note"><span>*</span> Indicates required fields</p>
					
                    <div class="form-group">
						<label class="cus-label">Your email <span>*</span></label>
                        <input type="email" class="form-control @error("email") invalid @enderror" aria-describedby="emailHelp" name="email" value="{{old("email")}}" >
                        @error("email")
                        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
						<label class="cus-label">Your company <span>*</span></label>
                        <input type="text" class="form-control @error("company") invalid @enderror" name="company" value="{{old("company")}}">
                        @error("company")
                        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
						<label class="cus-label">Your name <span>*</span></label>
                        <input type="text" class="form-control @error("name") invalid @enderror" value="{{old("name")}}" name="name">
                        @error("name")
                        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
						<label class="cus-label">Your message <span>*</span></label>
                        <textarea rows="3" class="form-control" name="message" ></textarea>
                        @error("message")
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
    			<div class="col-lg-6 pb-5  mt-4">
                <h4 class="text-blue font mb-4 text-center">Contact Information</h4>
                <p>{{$profile->company_name}}</p>
                <p>Mailing Address:  {{$profile->address}}</p>
                <p>Tel: {{$profile->phone}} </p>
                @if($profile->fax)
                <p>Fax: {{$profile->fax}} </p>
                @endif
                <p>{{$profile->company_email}}</p>
                <p><a href="{{$profile->site}} ">{{$profile->site}} </a></p>
                
            </div>
          </div>
    </div>
  </div>
        
    </div>

@endsection
