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


        <hr class="my-5" width="90%">


        <div class="row d-flex justify-content-between mt-5">
            <div class="col-lg-3 pb-5">
                <h4 class="text-blue font text-center mb-4">Contact Information</h4>
                <form action="{{route("company-contact",$profile->company_email)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control @error("email") invalid @enderror" aria-describedby="emailHelp" name="email" value="{{old("email")}}" placeholder="Your E-mail *">
                        @error("email")
                        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control @error("company") invalid @enderror" name="company" value="{{old("company")}}" placeholder="Your Company *">
                        @error("company")
                        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control @error("name") invalid @enderror"  placeholder="Your Name *" value="{{old("name")}}" name="name">
                        @error("name")
                        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea rows="3" class="form-control" name="message" placeholder="Your message *"></textarea>
                        @error("message")
                        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="row d-flex justify-content-center">
                        <button type="submit" class="btn btn-blue form-btn px-5">Submit</button>
                    </div>
                </form>

            </div>


            <div class="col-lg-6 pb-3 text-justify">
                <h4 class="font text-center mb-4"><a href="{!! $profile->site !!}" class="text-blue">Visit This Company's Website</a></h4>
                <p>
                    {!!$profile->description!!}
                </p>
            </div>


            <div class="col-lg-3 pb-3">
                <h4 class="text-blue font mb-4 text-center">Contact Information</h4>
                <p>{{$profile->company_name}}</p>
                <p>Mailing Address:  {{$profile->address}}</p>
                <p>Tel: {{$profile->phone}} </p>
                @if($profile->fax)
                <p>Fax: {{$profile->fax}} </p>
                @endif
                <p>{{$profile->company_email}}</p>
                <p><a href="{{$profile->site}} ">{{$profile->site}} </a></p>
                <p >
                    {!! isset($profile->media()->get()->first()->video) ? $profile->media()->get()->first()->video:'<iframe width="100%"  src="https://www.youtube.com/embed/Wdezk8nmt7Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'!!}
                </p>
            </div>
        </div>
    </div>

@endsection
