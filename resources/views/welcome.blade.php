@extends('layouts.app')

@section('content')
    <!-- 1st Section Start -->
    <div class="container mt-5">
        @if(session()->has("success"))
        <h1 class="text-center alert alert-success">
            {{session("success")}}
        </h1>
        @endif
        @if(session()->has("error"))
                <h1 class="text-center alert alert-danger">
                    {{session("error")}}
                </h1>
        @endif
        <h3 class="text-center mb-0 font-weight-bold" style="color:#106BC7;">{{trans("home.welcome_head")}}</h3>
        <p class=" font-weight-bold text-justify mt-4" style="line-height: 30px;text-transform: none !important;">
            {{trans("home.wlc_msg_1")}}

            <br>
            <a href="{{route("register")}}">{{trans("home.wlc_link")}}</a> {{trans("home.wlc_msg_2")}}
        </p>
    </div>
    <!-- 1st Section End -->
{{--    <hr class="mt-3 mb-3" width="61%" >--}}
    <br>

    <!-- 2nd Section Categories -->
    @include("layouts.partial.categories")
    <!-- 2nd Section End -->

	 <!-- Computer -->
    <!-- div id="wwa" class="container padding-y pt-2 pb-3 d-none d-md-block d-md-none">
        <div class="row d-flex p-0">
            <div class="col-lg-6 col-sm-6 pr-lg-4">
                <h1 class="text-blue mb-3" >{{trans("home.who_we_are")}}</h1>
                <p class="lead text-justify font-weight-normal">
                    {{trans("home.who_we_are_msg")}}
                </p></div>
            <div class="col-lg-6 col-sm-6 p-2">
                <img class="img-fluid img-responsive" src="{{asset("assets/front_end/images/1.jpg")}}" style="max-height:280px;width:100%;border-radius:7px;" >
            </div>
        </div>



        <div class="row d-flex">
            <div class="col-sm-6 col-lg-6 p-2">
                <img src="{{asset("assets/front_end/images/2.jpg")}}" class="img-fluid img-responsive" style="max-height:280px;width:100%;border-radius:7px;">
            </div>
            <div class="col-lg-6 col-sm-6">
                <h1 class="text-blue text-left mb-3">{{trans("home.our_mission")}}</h1>
                <p class="lead text-justify font-weight-normal">
                    {{trans("home.our_mission_msg")}}
                </p></div>
        </div>
    </div>
    <!-- Mobile -->
    <!-- div id="wwa" class="container padding-y pt-2 pb-3 d-block d-md-none">
        <div class="row d-flex p-3">
            <div class="col-lg-6 pr-lg-4">
                <h1 class="text-blue mb-3" >{{trans("home.who_we_are")}}</h1>
                <p class="lead text-justify font-weight-normal">
                    {{trans("home.who_we_are_msg")}}
                </p></div>
            <div class="col-lg-6 p-0">
                <img class="img-fluid img-responsive" src="{{asset("assets/front_end/images/1.jpg")}}" style="max-height:280px;width:100%;border-radius:7px;" >
            </div>
        </div>



        <div class="row d-flex p-3">
            <div class="col-lg-6 pl-lg-4">
                <h1 class="text-blue text-left mb-3">{{trans("home.our_mission")}}</h1>
                <p class="lead text-justify font-weight-normal">
                    {{trans("home.our_mission_msg")}}
                </p></div>
            <div class="col-sm-12 col-lg-6 p-0">
                <img src="{{asset("assets/front_end/images/2.jpg")}}" class="img-fluid img-responsive" style="max-height:280px;width:100%;border-radius:7px;">
            </div>
        </div>
    </div>


    <!-- <div id="magazine" class="container-fluid mt-5 text-light text-center p-4">
        <h1>Canadian Exports Magazine</h1>
        <p class="lead font-weight-normal">To receive Canadian Exports Magazine to your email, join our Info-Letter above.</p>
        <form class="row d-flex justify-content-center" action="{{route("info-letter")}}" method="post">
            <div class="container">
                @csrf
                <div class="row">
                    <div class="form-group col-lg-6 my-3">
                        <input type="text" class="form-control p-4"  name="company_name" placeholder="Your Company Name">
                        @error('company_name')
                        <small id="invalid-pw" class="form-text ml-3 text-danger font-weight-bold"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 my-3">
                        <input type="text" class="form-control p-4"  name="name" placeholder="Your Name">
                        @error('name')
                        <small id="invalid-pw" class="form-text ml-3 text-danger font-weight-bold"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 my-3">
                        <input type="email" class="form-control p-4"  name="email"  placeholder="Your E-mail">
                        @error('email')
                        <small id="invalid-pw" class="form-text ml-3 text-danger font-weight-bold"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 my-3">
                        <input type="text" class="form-control p-4" name="country"  placeholder="Your Country">
                        @error('country')
                        <small id="invalid-pw" class="form-text ml-3 text-danger font-weight-bold"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center">
                        <button type="submit" class="button btn  btn-outline-white mt-4">SUBSCRIBE</button>
                    </div>
                </div>
            </div>
        </form>
    </div> -->

<div class="bg-blue mb-5 mt-5">
{{--        inquiries to buy--}}
    @if(count(getAllItems())>0)

        @include("layouts.partial.items")

     @endif
    {{--        ***********************--}}
</div>


	<!-- Desktop -->
    @if(count(getAllBanAndSpo("sponsor"))>0)

    <div class="container" id="home_sponser">
        <h1 class="text-blue text-center">{{trans("home.sponsor")}}</h1>
        <div class="row d-flex align-items-center justify-content-around mb-3">
            @foreach(getAllBanAndSpo("sponsor") as $s)
            <div class="col-12 col-lg-3 col-md-3 col-sm-3 p-3">

				<a href="{{$s->url}}">
					<div class="home-shadow-card">
						<img src="{{asset("storage/".$s->image)}}" class="img-fluid">
					</div>
				</a>

            </div>
            @endforeach

        </div>
    </div>
    @endif


    @if(count(getAllBanAndSpo("banner"))>0)
    <div class="container-fluid bg-blue" id="home_featured_exporters">
        <h1 class="text-light text-center">{{trans("home.banner")}}</h1>
        <div class="row d-flex align-items-center m-0">
            <div class="container">
                <div class="row d-flex justify-content-start align-items-center">
                    @foreach(getAllBanAndSpo("banner") as $b)
                    <div class="col-sm-3 text-center">
                        <a href="{{$b->url}}">
							<div class="home-shadow-card">
								<img src="{{asset("storage/".$b->image)}}" class="img-fluid" style="border-radius:10px;height:110px;width:auto;" />
							</div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(count(getAllEvents())>0)
    <div id="itb" class="container padding-y">
        <h1 class="text-blue text-center">Featured Events</h1>
        <div class="row d-flex justify-content-between my-3">

           @foreach(getAllEvents(3) as $event)
            <div class="col-lg-4 p-3" >
                <div class="itb container-fluid" style="border-radius:7px;">
                    <div class="py-4">
                        <a href="#" class="text-dark">
                            <h4 class="font-weight-bold mt-2">{{str_truncate($event->title,20," ","...")}}</h4>
                        </a>
                        <div class="mt-3">
                            <h6 class="font-weight-bold text-secondary mt-3">Start Date: : <span>{{$event->start_at}}</span></h6>
                            <h6 class="font-weight-bold text-secondary mt-3">End Date : <span>{{$event->end_at}}</span></h6>
                            <h6 class="font-weight-bold text-secondary mt-3">Venue : <span>{{str_truncate($event->venue,30," ","...")}}</span></h6>
                            <h6 class="font-weight-bold text-secondary mt-3">City : <span>{{$event->city}}</span></h6>
                            <h6 class="font-weight-bold text-secondary mt-3">Country : <span>{{$event->country}}</span></h6>
                            <a href="{{url("event/".$event->id)}}" class=""><h6 class="text-success font-weight-bold text-right mt-3">Event Detail</h6></a>
                            @if(isset($event->url))
                            <a href="{{$event->url}}" target="_blank" class=""><h6 class="text-success font-weight-bold text-right">Event Website</h6></a>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
        <div class="row d-flex justify-content-center">
            <a href="{{url("page/events")}}" class="btn btn-outline-blue px-5">SEE ALL EVENTS</a>
        </div>
    </div>
    @endif
    @if(getCurrentIssue()!=null)
    <div class="container-fluid padding-y pb-3 bg-blue">
        <h1 class="text-light text-center">Canadian Exports Magazine</h1>
        <p class="font-weight-bold text-center text-light" style="line-height:30px;">To receive Canadian Exports Magazine to your email, join our Info-Letter above.</p>
        <div class="row d-flex align-items-center my-5">
            <div class="container">
                <div class="row">
                        <div class="col-lg-6 d-flex justify-content-end right">
                            <a href="{{asset("storage/".getCurrentIssue()->pdf)}}">
                                <img src="{{asset("storage/".getCurrentIssue()->front_image)}}" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-lg-6  d-none d-md-block d-md-none">
	                        <div class="p-3 d-flex align-items-center left">
	                            <div>
	                            <h4 class="text-light mt-1">{{getCurrentIssue()->title}}</h4>

	                            <a href="{{url("page/see-all-magazines")}}" class="btn button btn-outline-white mt-3" style="border: 2px solid !important;">SEE ALL MAGAZINES</a>
	                            </div>
	                        </div>
                        </div>
                        <div class="col-lg-6 d-block d-md-none">
	                        <div class="p-3 d-flex align-items-center text-center">
	                            <div>
	                            <h4 class="text-light mt-1">{{getCurrentIssue()->title}}</h4>

	                            <a href="{{url("page/see-all-magazines")}}" class="btn button btn-outline-white mt-3" style="border: 2px solid !important;">SEE ALL MAGAZINES</a>
	                            </div>
	                        </div>
                        </div>
                </div>
            </div>
        </div>

    </div>

    @endif
@endsection
