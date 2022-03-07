@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-blue mb-5">Register my business</h1>
    <ul class="font-weight-bold" style="line-height: 30px;">
        <li>Please fill in this secure online form.</li>
        <li>All online orders are processed the next business day· Pricing includes all applicable taxes.</li>
        <li>Phone order hours: 1-877-333-3014, Mon - Fri, 9am - 5pm EST.</li>
    </ul>
</div>


<div class="container">
    <form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
        @csrf

{{--        ******************************************** 1 *********************************************************--}}
<style type="text/css">
.fromgroupheader{
	font-color: white;
	font-weight: bold;
	padding: 5px;
	background: linear-gradient(to bottom, #3f71c6 0%,#183774 100%);
}
.fromgroupheader2{
	font-color: white;
	font-weight: bold;
	padding: 5px;
	background: linear-gradient(to bottom, #52B3D7 0%,#0C9CCB 100%);
}
</style>
        <h5 class="text-white mb-3 fromgroupheader text-center">1 of 4 - Registration Package</h5>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="package" id="one" value="one" checked>
            <label class="form-check-label" for="exampleRadios1">
                One months subscription - $6.99*
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="package" id="two" value="two">
            <label class="form-check-label" for="exampleRadios2">
                Three months subscription - $13.98* (one months free)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="package" id="three" value="three">
            <label class="form-check-label" for="exampleRadios3">
                One year subscription - $55.92* (four months free)
            </label>
        </div>
        @error("package")
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror

        <p class="font-weight-bold mt-3">
            * If you ever feel that we did not deliver the promised services to your full satisfaction, we will give you a full refund of your subscription fee. You have 30 days to decide
        </p>

{{--        *********************************************** 2 ********************************************************--}}
        <h5 class="text-white fromgroupheader text-center my-3">2 of 4 - User Profile</h5>

        <div class="form-group">
            <input type="text" class="form-control p-3 @error('name') invalid @endif" name="name" value="{{old("name")}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your name and title *">
            @error('name')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                     {{$message}}
                </small>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control p-3 @error('email') invalid @endif" name="email" value="{{old("email")}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email *">
            @error('email')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control p-3 @error('password') invalid @endif" name="password" id="exampleInputPassword1" placeholder="Password *">
            @error('password')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control p-3 @error('password') invalid @endif" name="password_confirmation" id="exampleInputPassword1" placeholder="Confirm password *">
        </div>

{{--        *************************************************** 3 *************************************************--}}

        <h5 class="text-white fromgroupheader text-center my-3">3 of 4 - Select Your Business Categories (Industry Sectors)</h5>
        <p class="font-weight-bold mb-5">
            Under which Business Categories (Industry Sectors) do you want your business to be listed? Please select no more than three (3).
        </p>

        @error('categories')
        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
            {{$message}}
        </small>
        @enderror
        <div class="form-row">
            @foreach(getAllCategories() as $category)
                <div class="col-lg-6">
                    <div class="form-check">
                        <input class="form-check-input" name="categories[]" type="checkbox" value="{{$category->id}}" id="{{$category->name_en}}">
                        <label class="form-check-label" for="{{$category->name_en}}">
                            {{$category->name_en}}
                        </label>
                    </div>
                </div>
            @endforeach

        </div>

{{--            ************************************************* 4 ********************************************--}}
        <h5 class="text-white fromgroupheader text-center my-3">4 of 4 - Business Profile</h5>

        <div class="form-group">
            <input type="text" class="form-control p-3  @error('company_name') invalid @endif" name="company_name" value="{{old("company_name")}}"  id="exampleInputEmail1" aria-describedby="name" placeholder="Company name *">
            @error('company_name')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>

        <div class="form-group">
            <input type="text" class="form-control p-3  @error('company_email') invalid @endif" name="company_email" value="{{old("company_email")}}"  id="exampleInputEmail1" aria-describedby="email" placeholder="Company Email *">
            @error('company_email')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>


        <div class="form-group">
            <textarea rows="3" class="form-control p-3 @error('address') invalid @endif" name="address" placeholder="Mailing address with postal colde and address *"></textarea>
            @error('address')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>
        <div class="form-group">
            <input type="tel" class="form-control p-3 @error('phone') invalid @endif" name="phone" value="{{old("phone")}}" id="exampleInputPassword1" placeholder="Phone *">
            @error('phone')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>
        <div class="form-group">
            <input type="url" class="form-control p-3 @error('site') invalid @endif" name="site" value="{{old("site")}}" id="exampleInputPassword1" placeholder="Website *">
            @error('site')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>

        <div class="form-group">
            <textarea rows="3" class="form-control p-3 @error('short_description') invalid @endif" name="short_description" placeholder="Short Business Description *"></textarea>
            @error('short_description')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>

        <div class="form-group">
            <textarea rows="3" class="form-control p-3 @error('description') invalid @endif" name="description" placeholder="Detailed Business Description *"></textarea>
            @error('description')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>

        <div class="form-group">
            <textarea rows="3" class="form-control p-3 @error('key_word') invalid @endif" name="key_word" placeholder="Keywords : separated with commas *"></textarea>
            @error('key_word')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
        </div>



        <p class="font-weight-bold my-5">
            The following information is optional, our agents will do it for you. If you would rather do it yourself, please click below
        </p>


        <h5 class="text-white fromgroupheader2 text-center my-5" data-toggle="collapse" href="#media" role="button" aria-expanded="false" aria-controls="media">
            Media (optional)
        </h5>

        <div class="collapse" id="media">
            <div class="container">

                <div class="form-group">
                    <label for="exampleFormControlFile1">Logo (Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg)</label>
                    <input type="file" class="form-control-file" name="logo" id="exampleFormControlFile1">
                    @error('logo')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1" class="mt-3">Welcome Video </label>
                    <input type="url" placeholder="Enter the YouTube URL. Valid URL formats must include https://www.youtube.com" name="video" class="form-control-file" id="exampleFormControlFile1">
                    @error('video')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1" class="mt-3">Image 1 (Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg)</label>
                    <input type="file" name="image_1" class="form-control-file" id="exampleFormControlFile1">
                    @error('image_1')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1" class="mt-3">Image 2 (Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg)</label>
                    <input type="file" name="image_2" class="form-control-file" id="exampleFormControlFile1">
                    @error('image_2')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1" class="mt-3">Image 3 (Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg)</label>
                    <input type="file" name="image_3" class="form-control-file" id="exampleFormControlFile1">
                    @error('image_3')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1" class="mt-3">Image 4 Files must be less than 5MB. Allowed file types: png, gif, jpg, jpeg</label>
                    <input type="file" name="image_4" class="form-control-file" id="exampleFormControlFile1">
                    @error('image_4')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>

            </div>
        </div>








        <h5 class="text-white fromgroupheader2 text-center my-3" data-toggle="collapse" href="#social-media" role="button" aria-expanded="false" aria-controls="social-media">
            Social Media (optional)
        </h5>

        <div class="collapse" id="social-media">
            <div class="container">

                <div class="form-group">
                    <input type="text" class="form-control p-3" name="facebook" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Facebook">
                    @error('facebook')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control p-3" name="twitter" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Twitter">
                    @error('twitter')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control p-3" name="youtube"  id="exampleInputPassword1" placeholder="YouTube">
                    @error('youtube')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control p-3" name="linked_in"  id="exampleInputPassword1" placeholder="LinkedIn">
                    @error('linked_in')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control p-3" name="google"  id="exampleInputPassword1" placeholder="GooglePlus">
                    @error('google')
                    <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                        {{$message}}
                    </small>
                    @enderror
                </div>

            </div>
        </div>

        <div class="row d-flex justify-content-end mt-5 mr-1">
            <button type="submit" class="btn btn-blue form-btn px-5">Checkout</button>
        </div>

    </form>
</div>

@endsection
