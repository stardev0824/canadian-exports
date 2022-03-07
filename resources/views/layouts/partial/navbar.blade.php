<!-- Large Only -->
<nav class="navbar navbar-expand-lg px-lg-2 text-sm-center d-none d-lg-block d-md-none">
   <div class="container">
      <div class="navbar-brand d-flex flex-row justify-content-center align-items-center">
         <a class="d-none d-md-block d-md-none" href="{{url("/")}}">
         <img class="img-responsive" src="{{asset("assets/front_end/images/logo1.png")}}" alt="logo" height="60">
         </a>
          <img class="img-responsive" src="{{asset("assets/front_end/images/logo.png")}}" alt="logo" height="35">
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars text-blue"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul id="links" class="navbar-nav pl-1"  style="font-size:16px;">
            <!--li class="nav-item mx-lg-2">
               <a class="nav-link" href="{{url("/")}}">{{trans("nav_bar.home")}}</a>
            </li -->
            <li class="nav-item dropdown mx-lg-1">
               <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">{{trans("nav_bar.about_us")}}</a>
               <div class="dropdown-menu">
                  <a class="dropdown-item font-weight-bold" href="{{url("page/about")}}">{{trans("nav_bar.about_us")}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{url("page/how-these-business-categories-came-about")}}">{{trans("nav_bar.hbc")}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{url("page/inquiries-to-bay")}}">{{trans("nav_bar.itb")}}</a>
                  <div class="dropdown-divider"></div>
                  {{--                    <a class="dropdown-item font-weight-bold" href="{{url("page/one-more-thing")}}">{{trans("nav_bar.omt")}}</a>--}}
                  {{--
                  <div class="dropdown-divider"></div>
                  --}}
                  <a class="dropdown-item font-weight-bold" href="{{url("page/scam-alerts")}}">{{trans("nav_bar.sa")}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{url("page/success-stories")}}">{{trans("nav_bar.ss")}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{url("page/contact")}}">{{trans("nav_bar.cu")}}</a>
               </div>
            </li>
            <li class="nav-item mx-lg-2">
               <a class="nav-link" href="{{url("page/testimonials")}}">{{trans("nav_bar.testimonials")}}</a>
            </li>
            <li class="nav-item mx-lg-2">
               <a class="nav-link" href="{{url("page/info-letter")}}">{{trans("nav_bar.info-letter")}}</a>
            </li>
            <li class="nav-item mx-lg-2">
               <a class="nav-link" href="{{url("page/resources")}}">{{trans("nav_bar.resources")}}</a>
            </li>
         </ul>
         @auth
         <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown mx-lg-2">
               <a class="nav-link btn btn-blue dropdown-toggle px-4" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Welcome {{ucwords(auth()->user()->name)}}<i class="fas fa-user mx-3"></i></a>
               <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item font-weight-bold" href="{{url("account-settings")}}"><i class="fas fa-cog mr-2"></i>Account Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{route("home")}}"><i class="fas fa-cog mr-2"></i>Profile Management</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{route("user.media")}}"><i class="fas fa-cog mr-2"></i>Media</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{route("user.social-media")}}"><i class="fas fa-cog mr-2"></i>Social-Media</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{route("logout")}}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();
                  "><i class="fas fa-sign-out-alt mr-2"></i>Disconnect</a>
                  <form action="{{ route("logout") }}" id="logout-form" style="display: none;" method="post">
                  @csrf
                  </form>
               </div>
               <form action="{{route("logout")}}" method="post">
               @csrf
               </form>
            </li>
         </ul>
         @else
         <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-lg-2">
                <a class="nav-link btn btn-blue nav-bt px-4" href="{{url("login")}}">{{trans("nav_bar.login")}}</a>
            </li>
            <li class="nav-item mx-lg-2 sp-t">
                <a class="nav-link btn btn-blue nav-bt px-4" href="{{url("register")}}">{{trans("nav_bar.register")}}</a>
            </li>
            </ul>  -->
         <!-- Custom change by Designer -->
         <div class="d-none d-md-block d-md-none setting-search">
            <div class="search-container float-left ml-3">
               <form action="/page/search" style="position: relative;">

                  <!-- <a href="/page/search?q=&type=advanced" class="addwance_opt" style="margin-left:2px;margin-top:35px;position:absolute;font-size:13px;">Advanced Search</a>	 -->
                  <input style="width:100%;padding-right: 40px;" type="text" placeholder="Search.." name="q" />
				  <a href="/advance-search" class="addwance_opt" style="margin-left:2px;margin-top:35px;position:absolute;font-size:13px;">Advanced Search</a>
                  <!-- <input style="width:180px;" type="text" placeholder="Search.." name="q"> -->
                  <button type="submit" style="position: absolute;right: 0;background: transparent;top: 0; padding: 4px;">
                     <!-- <i class="fa fa-search"></i> --><span class="serarch_icon_btn"><img src="/assets/front_end/images/magnifying.png" alt=''/></span>
                  </button>
               </form>
            </div>
            <!-- div class="float-right ml-1">
               <a class="nav-link btn-blue nav-bt px-1  p-2 border border-info" style="border-radius:5px;text:shadow:0px;" href="{{url("register")}}"><!-- i class="fas fa-user-plus"></i> {{trans("nav_bar.register")}}</a></a>
            </div -->
            <div class="float-right ml-2">

               <a class="nav-link btn-blue nav-bt px-1 p-2 border border-info" style="border-radius:5px;" href="{{url("login")}}">
               <!--i class="fas fa-sign-in-alt"></i --> {{trans("nav_bar.login")}} / {{trans("nav_bar.register")}}</a>
            </div>
         </div>
         <!-- Custom change by Designer -->
      </div>
      @endif

   </div>
</nav>
<!--Navbar-->
<!-- Mobile Only -->
<div class="d-block d-lg-none">
   <nav class="navbar navbar-dark  indigo darken-2">
      <!-- Navbar brand -->
      <a class="navbar-brand text-dark" href="{{url("/")}}" style="width:auto;">
      <img class="img-responsive" src="{{asset("assets/front_end/images/logo1.png")}}" alt="logo" height="60">
      <img class="img-responsive" src="{{asset("assets/front_end/images/logo.png")}}" alt="logo" height="45">
      </a>
      <!-- Collapse button -->
      <button class="navbar-toggler third-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent22"
         aria-controls="navbarSupportedContent22" aria-expanded="false" aria-label="Toggle navigation">
         <div class="animated-icon3"><span></span><span></span><span></span></div>
      </button>
      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent22">
         <!-- Links -->
         <ul id="links" class="navbar-nav pl-1"  style="font-size:16px;">
            <li class="nav-item mx-lg-2">
               <a class="nav-link" href="{{url("/")}}">{{trans("nav_bar.home")}}</a>
            </li>
            <li class="nav-item dropdown mx-lg-1">
               <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" href="#">{{trans("nav_bar.about_us")}}</a>
               <div class="dropdown-menu">
                  <a class="dropdown-item font-weight-bold" href="{{url("page/about")}}">{{trans("nav_bar.about_us")}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{url("page/how-these-business-categories-came-about")}}">{{trans("nav_bar.hbc")}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{url("page/inquiries-to-bay")}}">{{trans("nav_bar.itb")}}</a>
                  <div class="dropdown-divider"></div>
                  {{--                    <a class="dropdown-item font-weight-bold" href="{{url("page/one-more-thing")}}">{{trans("nav_bar.omt")}}</a>--}}
                  {{--
                  <div class="dropdown-divider"></div>
                  --}}
                  <a class="dropdown-item font-weight-bold" href="{{url("page/scam-alerts")}}">{{trans("nav_bar.sa")}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{url("page/success-stories")}}">{{trans("nav_bar.ss")}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{url("page/contact")}}">{{trans("nav_bar.cu")}}</a>
               </div>
            </li>
            <li class="nav-item mx-lg-2">
               <a class="nav-link" href="{{url("page/testimonials")}}">{{trans("nav_bar.testimonials")}}</a>
            </li>
            <li class="nav-item mx-lg-2">
               <a class="nav-link" href="{{url("page/info-letter")}}">{{trans("nav_bar.info-letter")}}</a>
            </li>
            <li class="nav-item mx-lg-2">
               <a class="nav-link" href="{{url("page/resources")}}">{{trans("nav_bar.resources")}}</a>
            </li>
         </ul>
         <!-- Links -->
         @auth
         <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown mx-lg-2">
               <a class="nav-link btn btn-blue dropdown-toggle px-4" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Welcome {{ucwords(auth()->user()->name)}}<i class="fas fa-user mx-3"></i></a>
               <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item font-weight-bold" href="{{url("account-settings")}}"><i class="fas fa-cog mr-2"></i>Account Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{route("home")}}"><i class="fas fa-cog mr-2"></i>Profile Management</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{route("user.media")}}"><i class="fas fa-cog mr-2"></i>Media</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{route("user.social-media")}}"><i class="fas fa-cog mr-2"></i>Social-Media</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item font-weight-bold" href="{{route("logout")}}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();
                  "><i class="fas fa-sign-out-alt mr-2"></i>Disconnect</a>
                  <form action="{{ route("logout") }}" id="logout-form" style="display: none;" method="post">
                  @csrf
                  </form>
               </div>
               <form action="{{route("logout")}}" method="post">
               @csrf
               </form>
            </li>
         </ul>
         @else
         <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-lg-2">
                <a class="nav-link btn btn-blue nav-bt px-4" href="{{url("login")}}">{{trans("nav_bar.login")}}</a>
            </li>
            <li class="nav-item mx-lg-2 sp-t">
                <a class="nav-link btn btn-blue nav-bt px-4" href="{{url("register")}}">{{trans("nav_bar.register")}}</a>
            </li>
            </ul>  -->
         <!-- Custom change by Designer -->
         <div class="d-block">
            <div class="row">


               <div class="input-group-append mt-2 col-12 outer-search-cus">
                  <input class="form-control my-0 py-1 amber-border mb-0 " type="text" id='qm' name='qm' placeholder="Search" aria-label="Search">
                  <span class="amber lighten-3" id="basic-text1" onclick="window.location.assign('/page/search?q='+$('#qm').val());">
                     <!-- <i class="fas fa-search text-grey" aria-hidden="true"></i> -->
                     <div class="serarch_icon_btn"><img src="/assets/front_end/images/magnifying.png" alt=''/></div>
                  </span>
               </div>
			   <div class="col-12 ad-search-cus">
					<a href="/advance-search" class="custom_advance" >Advanced Search</a>
				</div>
            </div>
            <div class="row">
               <!-- div class="col-6">
                  <a class="nav-link btn-blue nav-bt px-1  p-2 text-center" style="border-radius:5px;text:shadow:0px;" href="{{url("register")}}"><i class="fas fa-user-plus"></i> {{trans("nav_bar.register")}}</a></a>
               </div -->
               <div class="col-12">
                  <a class="nav-link btn-blue nav-bt px-1 p-2 text-center" style="border-radius:5px;text:shadow:0px;" href="{{url("login")}}"><!-- i class="fas fa-sign-in-alt"></i --> {{trans("nav_bar.login")}} / {{trans("nav_bar.register")}}</a>
               </div>
            </div>
         </div>
         <!-- Custom change by Designer -->

      @endif
</div>
<!-- Collapsible content -->
</nav>
</div>
