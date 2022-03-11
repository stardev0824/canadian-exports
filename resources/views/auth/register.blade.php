@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-blue mb-5">Register my business</h1>
        <p class="astrik-note"><span>*</span>Indicates required fields</p>

        <ul class="font-weight-bold" style="line-height: 30px;">
            <li>Please fill in this secure form</li>
            <li>All online orders are processed the next business day</li>
            <li>Pricing includes all applicable taxes</li>
            <li>Phone order hours: 1-877-333-3014, Monday - Friday, 9am - 5pm EST</li>
        </ul>
    </div>


    <div class="container">
        <form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
            @csrf

            {{--        ******************************************** 1 *********************************************************--}}
            <style type="text/css">
                .fromgroupheader {
                    font-color: white;
                    font-weight: bold;
                    padding: 5px;
                    background: linear-gradient(to bottom, #3f71c6 0%, #183774 100%);
                }

                .fromgroupheader2 {
                    font-color: white;
                    font-weight: bold;
                    padding: 5px;
                    background: linear-gradient(to bottom, #52B3D7 0%, #0C9CCB 100%);
                }

                .form-check-label {
                    margin-bottom: 0;
                    font-weight: 700;
                }

                .checkbox-inline span {
                    font-weight: 700;
                }

                .hideme {
                    visibility: hidden;
                }

                input::placeholder {
                    color: black !important;
                    font-size: 15px;
                }

                textarea::placeholder {
                    color: black !important;
                    font-size: 15px;
                }
                h1, h2, h3, h4, h5, h6, label, p{
                    text-transform: none !important;
                }
            </style>
            <h5 class="text-white mb-3 fromgroupheader text-center">1 of 4 - Registration package</h5>
            <?php
            if (isset($_COOKIE["vars"])) {
                $vars = json_decode($_COOKIE["vars"], true);
                setcookie("vars", "");
            }
            ?>
            <div class="row mt-4">
                <div class="col-md-3 col-sm-12">
                    <h4 class="card-title"><i>Free</i></h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="zero" value="zero" checked>
                        <label class="form-check-label" for="zero">
                            Free <br>(If you are a small and new business, you may register for free)
                        </label>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <h4 class="card-title"><i>Premium</i></h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="one" value="one">
                        <label class="form-check-label" for="one">
                            One-month subscription - $6.99*
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="two" value="two">
                        <label class="form-check-label" for="two">
                            Three-months subscription - $13.98* (one months free)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="three" value="three">
                        <label class="form-check-label" for="three">
                            One-year subscription - $55.92* (four months free)
                        </label>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h4 class="card-title"><i>Featured</i></h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="four" value="four">
                        <label class="form-check-label" for="four">
                            One-month subscription - $69.9*
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="five" value="five">
                        <label class="form-check-label" for="five">
                            Three-months subscription - $139.8* (one months free)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package" id="six" value="six">
                        <label class="form-check-label" for="six">
                            One-year subscription - $559.2* (four months free)
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                What are the differences between these registration packages? <a href="#">Click here</a>
            </div>
            @error("package")
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="Recuring" id="recuring" checked>
                <label class="form-check-label" for="recuring">
                    Auto renew
                </label>
            </div>

            <p class="font-weight-bold mt-3">
                * If, for whatever reason, you do not feel that we delivered the promised services to your full satisfaction, we will give you a full refund of your subscription fee. You have 30 days to decide if you are satisfied with our services or not and we offer a money-back guarantee should you decide to withdraw your subscription within the 30-day trial period
            </p>
            

            {{--        *********************************************** 2 ********************************************************--}}
            <h5 class="text-white fromgroupheader text-center my-3">2 of 4 - User profile</h5>

            <div class="form-group">
                <label class="cus-label" for="name_title">Name and title<span>*</span></label>
                <input type="text" required class="form-control p-3 @error('name') invalid @endif" name="name"
                       value="<?php if (isset($vars['name'])) echo strip_tags($vars['name']);?>{{old("name")}}"
                       id="name_title" aria-describedby="emailHelp"
                       placeholder="Please include your full name and the title you would to be addressed by, seprate by a dash or hyphen. For example. John Smith">
                @error('name')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label class="cus-label">Email <span>*</span></label>
                <input type="email" required class="form-control p-3 @error('email') invalid @endif" name="email"
                       value="<?php if (isset($vars['email'])) echo strip_tags($vars['email']);?>{{old("email")}}"
                       id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="You will use this email to log in to your account">
                @error('email')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label class="cus-label">Select password <span>*</span></label>
                <input type="password" class="form-control p-3 @error('password') invalid @endif" name="password"
                       id="password" placeholder="" max="6">
                @error('password')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label class="cus-label">Confirm password <span>*</span></label>
                <input type="password" class="form-control p-3 @error('password') invalid @endif"
                       name="password_confirmation" id="confirm_password" placeholder="">
                <small id="confirm_password_error" class=" d-none form-text ml-3 text-danger"><i
                        class="far fa-times-circle mr-2"></i>
                    Password do not match
                </small>
            </div>

            {{-- *************************************************** 3 *************************************************--}}

            <h5 class="text-white fromgroupheader text-center my-3">3 of 4 - Select your business categories (industry
                sectors)</h5>
            <p class="font-weight-bold mb-4">
                Select up to three (3) business categories (industry sectors) that you would like your business profile to be featured in. This gives you the flexibility to reach a diverse range of potential clients. Select up to three (3) business categories (industry sectors) that you believe are most relevant to your brand
            </p>

            @error('categories')
            <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                {{$message}}
            </small>
            @enderror
            <small id="category_error" class=" d-none form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                Please limit your selection to a maximum of three business categories
            </small>
            <div class="form-row mb-4">

                @foreach(getAllCategories() as $category)
                    <div class="col-lg-6">
                        <div class="form-check catergoryCheck">
                            <input class="form-check-input"  onclick="checkcategory()" name="categories[]" type="checkbox"
                                   value="{{$category->id}}"
                                   id="business_category" <?php if (isset($vars) && in_array($category->id, $vars['categories'])) echo "checked"; ?>>
                            <label class="form-check-label" for="{{$category->name_en}}">
                                {{$category->name_en}}
                            </label>
                        </div>
                    </div>
                @endforeach

            </div>

            {{--            ************************************************* 4 ********************************************--}}
            <h5 class="text-white fromgroupheader text-center my-3">4 of 4 - Business profile</h5>

            <div class="form-group">
                <label class="cus-label">Company name <span>*</span></label>
                <input type="text" required class="form-control p-3  @error('company_name') invalid @endif"
                       name="company_name"
                       value="<?php if (isset($vars['company_name'])) echo strip_tags($vars['company_name']);?>{{old("company_name")}}"
                       id="exampleInputEmail1" aria-describedby="name" placeholder=" ">
                @error('company_name')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group">
                <label class="cus-label">Company email <span>*</span></label>
                <input type="text" required class="form-control p-3  @error('company_email') invalid @endif"
                       name="company_email"
                       value="<?php if (isset($vars['company_email'])) echo strip_tags($vars['company_email']);?>{{old("company_email")}}"
                       id="exampleInputEmail1" aria-describedby="email"
                       placeholder="Enter your business email, even if it is the same as the one you entered above">
                @error('company_email')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>


            <div class="form-group">
                <label class="cus-label">Mailing address <span>*</span></label>
                <textarea rows="3" required class="form-control p-3 @error('address') invalid @endif" name="address"
                          placeholder="Complete address, with Postal Code (ZIP Code) and country name"><?php if (isset($vars['address'])) echo strip_tags($vars['address']);?></textarea>
                @error('address')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label class="cus-label">Phone <span>*</span></label>
                <input type="tel" required class="form-control p-3 @error('phone') invalid @endif" name="phone"
                       value="<?php if (isset($vars['phone'])) echo strip_tags($vars['phone']);?>{{old("phone")}}"
                       id="exampleInputPassword1" placeholder="With area code">
                @error('phone')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>
            <div class="form-group">
                <label class="cus-label">Website <span>*</span></label>
                <input type="url" required class="form-control p-3 @error('site') invalid @endif" name="site"
                       value="<?php if (isset($vars['site'])) echo strip_tags($vars['site']);?>{{old("site")}}"
                       id="exampleInputPassword1" placeholder=" ">
                @error('site')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
            </div>

            <div class="form-group">
                <label class="cus-label">Short Business Description <span>*</span></label>
                <textarea rows="3" required id="short_description"
                          class="form-control p-3 @error('short_description') invalid @endif" name="short_description"
                          onkeyup="contar()" onkeypress="contar()"
                          placeholder="Describe the nature of your business in no more than 30 words. You can write your business slogan, company mission, or highlight your competitive advantage. This information will appear next to your company name on the search results page and will help you to attract visitors to your profile page. Make sure to describe your business in an engaging, informative way so that when the importer reads it, they will be more inclined to check out your business profile

For example, if the importer is looking for product x, from Canada, they will carry out a search on the Canadian Exports website and may come up with 20+ search results. Each one of these results will have their own short business description and the importer will click on the one that appeals to them the most. That’s why your description about what you offer needs to be as eye-catching as possible to stand out from the rest of your competitors"
                ><?php if (isset($vars['short_description'])) echo strip_tags($vars['short_description']);?></textarea>
                @error('short_description')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
                <small id="short_description_error" class=" d-none form-text ml-3 text-danger"><i
                        class="far fa-times-circle mr-2"></i>
                    The maximum number of words allowed is 30
                </small>
            </div>

            <div class="form-group">
                <label class="cus-label">Detailed Business Description <span>*</span></label>
                <textarea rows="3" required id="detail_description"
                          class="form-control p-3 @error('description') invalid @endif" name="description"
                          onkeyup="detail_contar()" onkeypress="detail_contar()"
                          placeholder="This is the text that will appear on your actual business profile page. Once the importer has selected YOUR company and clicked on YOUR name in the search results page, they will be taken to your business profile page.  Use this space to outline what your business does and why potential customers should choose you. Your description should be no more than 300 words and include details about your products and services. This is your opportunity to reach potential clients, introduce them to your products, and attract further business"
                ><?php if (isset($vars['description'])) echo strip_tags($vars['description']);?></textarea>
                @error('description')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
                <small id="detail_description_error" class=" d-none form-text ml-3 text-danger"><i
                        class="far fa-times-circle mr-2"></i>
                    The maximum number of words allowed is 300
                </small>
            </div>
            <div class="form-group">
                <label class="cus-label">Keywords <span>*</span></label>
                <textarea rows="3" required id="keywords"
                          class="form-control p-3 @error('key_word') invalid @endif" name="key_word"
                          placeholder="Enter up to 5 separate keywords or keyphrases, separated by commas. These are extremely useful when a potential client is searching for a particular product or service so be specific and target your business product as well as you can

If you are unsure of what to include, here is an example: you have a family-run business that produces homemade candles. Your suggested keywords or keyphrases may look something like this: candles, homemade, family-run business, traditional, made to order

As you can see, the example includes 5 keywords/keyphrases that highlight the main features of the product"
                ><?php if (isset($vars['key_word'])) echo strip_tags($vars['key_word']);?></textarea>
                @error('key_word')
                <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
                    {{$message}}
                </small>
                @enderror
                <small id="keywords_error" class=" d-none form-text ml-3 text-danger">
                </small>
            </div>



            <p class="font-weight-bold " id="hideme">
                The following information is optional and our agents can enter the details for you. If you prefer to do so yourself, please click below
            </p>

            <div class="input-cus-style">
                <h5 class="text-white fromgroupheader2 text-center my-2 clickhide" data-toggle="collapse" href="#media"
                    role="button" aria-expanded="false" aria-controls="media">
                    Media (optional)
                </h5>

                <div class="collapse" id="media">
                    <div class="container">

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Logo (Files must be less than 5MB. Allowed file types:
                                PNG, GIF, JPG, JPEG)</label>
                            <input type="file" onchange="validateFileType(this,0)" class="form-control-file" name="logo"
                                   id="exampleFormControlFile1" placeholder=" ">
                            <small id="file_error0" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                abc
                            </small>
                            @error('logo')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="mt-3">Welcome Video </label>
                            <input type="url"
                                   placeholder="Enter the YouTube URL. Valid URL formats must include https://www.youtube.com"
                                   name="video" class="form-control-file" id="exampleFormControlFile1">
                            @error('video')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="mt-3">Image-1 (Files must be less than 5MB. Allowed file types:
                                PNG, GIF, JPG, JPEG)</label>
                            <input type="file" onchange="validateFileType(this,1)" name="image_1"
                                   class="form-control-file" id="exampleFormControlFile1">
                            <small id="file_error1" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                abc
                            </small>
                            @error('image_1')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="mt-3">Image-2 (Files must be less than 5MB. Allowed file types:
                                PNG, GIF, JPG, JPEG)</label>
                            <input type="file" onchange="validateFileType(this,2)" name="image_2"
                                   class="form-control-file" id="exampleFormControlFile1">
                            <small id="file_error2" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                abc
                            </small>
                            @error('image_2')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="mt-3">Image-3 (Files must be less than 5MB. Allowed file types:
                                PNG, GIF, JPG, JPEG)</label>
                            <input type="file" onchange="validateFileType(this,3)" name="image_3"
                                   class="form-control-file" id="exampleFormControlFile1">
                            <small id="file_error3" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                abc
                            </small>
                            @error('image_3')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1" class="mt-3">Image-4 (Files must be less than 5MB. Allowed file types:
                                PNG, GIF, JPG, JPEG)</label>
                            <input type="file" onchange="validateFileType(this,4)" name="image_4"
                                   class="form-control-file" id="exampleFormControlFile1">
                            <small id="file_error4" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>

                            </small>
                            @error('image_4')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                    </div>
                </div>


                <h5 class="text-white fromgroupheader2 text-center my-3 clickhide" data-toggle="collapse"
                    href="#social-media" role="button" aria-expanded="false" aria-controls="social-media">
                    Social media (optional)
                </h5>

                <div class="collapse" id="social-media">
                    <div class="container">

                        <div class="form-group">
                            <label class="cus-label">Facebook</label>
                            <input type="text" class="form-control p-3" data-field="https://facebook.com"
                                   onchange="checkSocial(this,1)" onkeyup="checkSocial(this,1)" name="facebook" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder=""
                                   value="<?php if (isset($vars['facebook'])) echo strip_tags($vars['facebook']);?>">
                            <small id="social_error1" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                Please enter a facebook url

                            </small>

                            @error('facebook')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="cus-label">Twitter</label>
                            <input type="text" class="form-control p-3" data-field="https://twitter.com"
                                   onchange="checkSocial(this,2)" onkeyup="checkSocial(this,2)" name="twitter" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder=""
                                   value="<?php if (isset($vars['twitter'])) echo strip_tags($vars['twitter']);?>">
                            <small id="social_error2" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                Please enter a twitter url
                            </small>
                            @error('twitter')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="cus-label">YouTube</label>
                            <input type="text" class="form-control p-3" data-field="https://youtube.com"
                                   onchange="checkSocial(this,3)" onkeyup="checkSocial(this,3)" name="youtube" id="exampleInputPassword1"
                                   placeholder=""
                                   value="<?php if (isset($vars['youtube'])) echo strip_tags($vars['youtube']);?>">
                            <small id="social_error3" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                Please enter a youtube url
                            </small>
                            @error('youtube')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="cus-label">LinkedIn</label>
                            <input type="text" class="form-control p-3" data-field="https://linkedin.com"
                                   onchange="checkSocial(this,4)" onkeyup="checkSocial(this,4)" name="linked_in" id="exampleInputPassword1"
                                   placeholder=""
                                   value="<?php if (isset($vars['linked_in'])) echo strip_tags($vars['linked_in']);?>">
                            <small id="social_error4" class=" d-none form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                Please enter a linkedin url
                            </small>
                            @error('linked_in')
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                    <!-- div class="form-group">
                    <input type="text" class="form-control p-3" name="google"  id="exampleInputPassword1" placeholder="GooglePlus" value="<?php if (isset($vars['google'])) echo strip_tags($vars['google']);?>">
                    @error('google')
                        <small id="invalid-pw" class="form-text ml-3 text-danger"><i class="far fa-times-circle mr-2"></i>
{{$message}}
                        </small>
@enderror
                        </div -->

                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="capcha-outer">
                    @if(config('services.recaptcha.key'))
                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}">
                        </div>
                    @endif
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <small id="invalid-pw" class="form-text ml-3 text-danger"><i
                                    class="far fa-times-circle mr-2"></i>{{ $errors->first('g-recaptcha-response') }}
                            </small>
                        </span>
                    @endif
                </div>
            </div>
            <div class="checkbox-inline " style="margin-left: 45px;">
                <input type="checkbox" value="" required
                       class='mr-2'><span>By clicking Proceed, you agree to our <a href='/page/disclaimer'
                                                                                   target="_BLANK">Disclaimer</a>, <a
                        href='/page/disclaimer' target="_BLANK">Terms of use</a> and <a target="_BLANK"
                                                                                        href='/page/privacy_policy'>Privacy policy</a></span>
            </div>
            <div class="row d-flex justify-content-center mt-5 mr-1">
                <button type="submit" id="proceed_button" class="btn btn-blue form-btn px-5">Proceed</button>
            </div>

        </form>
    </div>
    <?php
   $locale = App::getLocale();

   if (App::isLocale('en') || App::isLocale('fr')) {
    ?>
<div class="container padding-y mt-3 mb-3">
    <p class="astrik-note" style="margin-left: 68px;"> Protecting your privacy is fundamental to our mission and business</p>

    <ul class="font-weight-bold" style="line-height: 30px;margin-left: 68px;">
        <li>We never sell your data or information </li>
        <li>We don't own the content you add to our website </li>
        <li>We never send you junk email</li>
    </ul>
<!--    <div id="click" class="row d-flex justify-content-between align-items-center px-5 py-4 canadian-exporters-click">
      <div class="col-lg-5 h1 d-flex justify-content-center">Canadian exporters</div>
      <button type="button" data-toggle="modal" data-target="#clickHere" class="col-lg-5 py-3 btn btn-blue"><span class="text-light h2">Click here</span></button>
   </div> -->
</div>
<?php
   }
   ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.canadian-exporters-click').remove();
        });
        $('#confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#proceed_button').prop("disabled", false);
                $('#confirm_password_error').addClass('d-none');
            } else {
                $('#confirm_password_error').removeClass('d-none');
                $('#proceed_button').prop("disabled", true);
            }
        });
        // $('#short_description').keyup(function (event) {
        //     var maxLength = 30;
        //     var Length = $("#short_description").val().length;
        //     if (Length >= maxLength) {
        //         $('#proceed_button').prop("disabled", true);
        //         $('#short_description_error').removeClass('d-none');
        //     } else {
        //         $('#proceed_button').prop("disabled", false);
        //         $('#short_description_error').addClass('d-none');
        //     }
        // });

        function contar(){
            var maxLength = 30;
            var total_words = $.trim($('[name="short_description"]').val()).split(' ').filter(function(v){return v!==''}).length;
            if (total_words > maxLength) {
                $('#proceed_button').prop("disabled", true);
                $('#short_description_error').removeClass('d-none');
            } else {
                $('#proceed_button').prop("disabled", false);
                $('#short_description_error').addClass('d-none');
            }
        }
        function detail_contar(){
            var maxLength = 300;
            var total_words = $.trim($('#detail_description').val()).split(' ').filter(function(v){return v!==''}).length;
            if (total_words > maxLength) {
                $('#proceed_button').prop("disabled", true);
                $('#detail_description_error').removeClass('d-none');
            } else {
                $('#proceed_button').prop("disabled", false);
                $('#detail_description_error').addClass('d-none');
            }
        }

        // $('#detail_description').keyup(function (event) {
        //     var maxLength = 300;
        //     var Length = $("#detail_description").val().length;
        //     if (Length >= maxLength) {
        //         $('#proceed_button').prop("disabled", true);
        //         $('#detail_description_error').removeClass('d-none');
        //     } else {
        //         $('#proceed_button').prop("disabled", false);
        //         $('#detail_description_error').addClass('d-none');
        //     }
        // });

        function validateFileType(e, id) {
            var fileName = $(e).val();
            var idxDot = fileName.lastIndexOf(".") + 1;
            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                $('#proceed_button').prop("disabled", false);
                $('#file_error' + id).addClass('d-none');
            } else {
                $('#file_error' + id).removeClass('d-none');
                $('#file_error' + id).html('<i class="far fa-times-circle mr-2"></i>File type not supported. The allowed types are jpg/jpeg and png');
                $(e).val('');
                $('#proceed_button').prop("disabled", true);

            }
            var maxSizeMb = 5;

            //Get the file that has been selected by
            //using JQuery's selector.
            var file = $(e)[0].files[0];

            //Make sure that a file has been selected before
            //attempting to get its size.
            if (file !== undefined) {

                //Get the size of the input file.
                var totalSize = file.size;

                //Convert bytes into MB.
                var totalSizeMb = totalSize / Math.pow(1024, 2);

                //Check to see if it is too large.
                if (totalSizeMb > maxSizeMb) {

                    //Create an error message to show to the user.
                    var errorMsg = 'File too large. Maximum file size is ' + maxSizeMb + 'MB. Selected file is ' + totalSizeMb.toFixed(2) + 'MB';

                    //Show the error.
                    $('#file_error' + id).removeClass('d-none');
                    $('#file_error' + id).html('<i class="far fa-times-circle mr-2"></i>' + errorMsg);
                    $(e).val();

                    //Return FALSE.
                    $('#proceed_button').prop("disabled", true);
                } else {
                    $('#file_error' + id).addClass('d-none');
                    $('#proceed_button').prop("disabled", false);
                }

            }
        }

        function checkSocial(e, id) {
            var string = $(e).val();
            var checkString = $(e).data('field');
            if (string.indexOf(checkString) > -1) {
                $('#proceed_button').prop("disabled", false);
                $('#social_error' + id).addClass('d-none');
            } else {
                $('#social_error' + id).removeClass('d-none');
                //Return FALSE.
                $('#proceed_button').prop("disabled", true);
            }
        }

        function checkcategory() {
            if ($(".catergoryCheck input:checkbox:checked").length > 3) {
                $('#category_error').removeClass('d-none');
                $('#proceed_button').prop("disabled", true);
            }
            else{
                $('#category_error').addClass('d-none');
                $('#proceed_button').prop("disabled", false);
            }
        }

        $("#keywords").on("keyup change paste", function(e) {
            var content = $("#keywords").val();
            var words = content.split(",").filter(item => item);
            var num_words = words.length;
            var limit = 5;
            if (num_words > limit) {
                var lastIndex = content.lastIndexOf(",");
                $("#keywords").val(content.substring(0, lastIndex));
                $("#keywords_error").removeClass('d-none');
                $("#keywords_error").html('<i\n' +
                    '                        class="far fa-times-circle mr-2"></i>Maximum of five tags, separated with commas');
                $('#proceed_button').prop("disabled", true);
                setTimeout(() => {
                    $("#keywords_error").addClass('d-none');
                    $('#proceed_button').prop("disabled", false);
                }, 1000)
            }
            else{
                $("#keywords_error").addClass('d-none');
                $('#proceed_button').prop("disabled", false);
            }

            var checkString = ',';
            if (content.indexOf(checkString) > -1) {
            } else {
                $("#keywords_error").removeClass('d-none');
                $("#keywords_error").html('<i\n' +
                    '                        class="far fa-times-circle mr-2"></i>Maximum of five tags, separated with commas');
                $('#proceed_button').prop("disabled", true);
            }
        });
    </script>

@endsection
