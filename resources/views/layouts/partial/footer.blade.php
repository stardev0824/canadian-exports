
<!-- Footer Start-->
<footer class="page-footer bg-dark text-light">
   <div class="container container-fluid text-center text-md-left">
      <div class="row text-center text-md-left py-5 d-flex justify-content-around">
         <div class="col-md-3 col-lg-3 col-xl-3 mt-3">
            <h6 class="text-uppercase mb-2 font-weight-bold text-blue pb-3 footer-title" style="text-transform: none !important;">{{trans("nav_bar.u_links")}}</h6>
            <p><a href="{{url("/")}}" class="text-light">{{trans("nav_bar.home")}}</a></p>
            <p><a href="{{url("page/about")}}" class="text-light">{{trans("nav_bar.about_us")}}</a></p>
            <p><a href="{{url("page/how-these-business-categories-came-about")}}" class="text-light">{{trans("nav_bar.hbc")}}</a></p>
            <p><a href="{{url("page/inquiries-to-bay")}}" class="text-light">{{trans("nav_bar.itb")}}</a></p>
            <p><a href="{{url("page/one-more-thing")}}" class="text-light">{{trans("nav_bar.omt")}}</a></p>
            <p><a href="{{url("page/scam-alerts")}}" class="text-light">{{trans("nav_bar.sa")}}</a></p>
            <p><a href="{{url("page/success-stories")}}" class="text-light">{{trans("nav_bar.ss")}}</a></p>
            <p><a href="{{url("page/testimonials")}}" class="text-light">{{trans("nav_bar.testimonials")}}</a></p>
            <p><a href="{{url("page/info-letter")}}" class="text-light">{{trans("nav_bar.info-letter")}}</a></p>
            <p><a href="{{url("page/resources")}}" class="text-light">{{trans("nav_bar.resources")}}</a></p>
         </div>
         <hr class="w-100 clearfix d-md-none">
         <div class="col-md-3 col-lg-3 col-xl-3 mt-3">
            <h6 class="text-uppercase mb-2 font-weight-bold text-blue pb-3 footer-title" style="text-transform: none !important;">{{trans("nav_bar.oth_l")}}</h6>
            <p>
               <a href="{{url("page/disclaimer")}}" class="text-light">{{trans("nav_bar.dis")}}</a>
            </p>
            {{--
            <p>--}}
               {{--                    <a href="#!" class="text-light">Online Business Directory</a>--}}
               {{--
            </p>
            --}}
            <p>
               <a href="{{url("page/contact")}}" class="text-light">{{trans("nav_bar.cu")}}</a>
            </p>
            <p>
               <a href="{{url("page/privacy_policy")}}" class="text-light">{{trans("nav_bar.pp")}}</a>
            </p>
            <p>
               <a href="{{url("page/comment_and_suggestion")}}" class="text-light">{{trans("nav_bar.comment_sug")}}</a>
            </p>
         </div>
         <hr class="clearfix d-md-none">
{{--         <div class="col-md-3 col-lg-3 col-xl-3 mt-3">--}}
{{--            <h6 class="text-uppercase mb-2 font-weight-bold text-blue pb-3 footer-title">{{trans("nav_bar.contact")}}</h6>--}}
{{--            <p class="text-light">--}}
{{--               <i class="fas fa-home mr-3"></i> {{isset(getInfos()->location)?getInfos()->location:"" }}--}}
{{--            </p>--}}
{{--            <p class="text-light">--}}
{{--               <i class="fas fa-envelope mr-3"></i> {{isset(getInfos()->email)?getInfos()->email:""}}--}}
{{--            </p>--}}
{{--            <p class="text-light">--}}
{{--               <i class="fas fa-phone mr-3"></i> {{isset(getInfos()->phone)?getInfos()->phone:""}}--}}
{{--            </p>--}}
{{--            <p class="text-light">--}}
{{--               <i class="fas fa-print mr-3"></i> {{isset(getInfos()->fax)?getInfos()->fax:""}}--}}
{{--            </p>--}}
{{--         </div>--}}
      </div>
      <hr>
      <div class="row d-flex align-items-center">
         <div class="col-md-12 col-lg-12 ml-lg-0 d-flex justify-content-center">
            <div class="text-center text-md-right">
               <ul class="list-unstyled list-inline ml-5">
                  @if(isset(getInfos()->facebook))
                  <li class="list-inline-item col-2 col-lg-2">
                     <a href="{{getInfos()->facebook}}" class="btn-floating btn-lg mx-0 facebook">
                     <i class="social_icons_img_1 social_icon_fb"></i>
                     </a>
                  </li>
                  @endif
                  @if(isset(getInfos()->twitter))
                  <li class="list-inline-item col-2 col-lg-2">
                     <a href="{{getInfos()->twitter}}" class="btn-floating btn-lg mx-0 twitter">
                     <i class="social_icons_img_1 social_icon_twitter"></i>
                     </a>
                  </li>
                  @endif
                  @if(isset(getInfos()->google))
                  <li class="list-inline-item col-2 col-lg-2">
                     <a href="{{getInfos()->google}}" class="btn-floating btn-lg mx-0 google">
                     <i class="social_icons_img_1 social_icon_googleplus"></i>
                     </a>
                  </li>
                  @endif
                  @if(isset(getInfos()->youtube))
                  <li class="list-inline-item col-2 col-lg-2">
                     <a href="{{getInfos()->youtube}}" class="btn-floating btn-lg mx-0 youtube">
                     <i class="social_icons_img_1 social_icon_youtube"></i>
                     </a>
                  </li>
                  @endif
                  @if(isset(getInfos()->linked_in))
                  <li class="list-inline-item col-2 col-lg-2">
                     <a href="{{getInfos()->linked_in}}" class="btn-floating btn-lg mx-0 linkedin">
                     <i class="social_icons_img_1 social_icon_linkedin"></i>
                     </a>
                  </li>
                  @endif
               </ul>
            </div>
         </div>
         <div class="col-md-12 col-lg-12 d-flex justify-content-center">
            <p class="text-center text-md-left" style="text-transform: none !important;">Copyright © 2006 - 2022. All rights reserved. 4R Business Services Inc.
               <!--a href="{{url("/")}}">
               <strong> canadianexports.org</strong>
               </a -->
            </p>
         </div>
      </div>
   </div>
</footer>
<!-- Footer End-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3H2FMRN739"></script>
<script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'G-3H2FMRN739');
</script>
<!-- <a href="#" class="btt">
   <i class="fas fa-arrow-alt-circle-up fa-3x"></i>
   </a> -->
<a href="#" class="lng" data-toggle="modal" data-target="#lng" onclick="this.style = 'margin-right:10px;'" >
   <!-- <i class="fas fa-language fa-3x mr-3" style="font-size:27pt;"></i> -->
   <img class="mr-3"  src="/storage/media/lang.png" style="border-radius:5px;width:55;opacity: 0.7;filter: alpha(opacity=70);" alt="">
</a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- FA KIT -->
<script src="https://kit.fontawesome.com/2646fa2bda.js"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/jquery.cookieMessage.min.js"></script>
<!-- Modal Click Here-->
<div class="modal fade" id="clickHere" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-blue" id="">Canadian Exporters</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <ul class="list-group">
               <li class="list-group-item">
                  <a href="{{url("page/about")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"À propos de nous":"About us"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/how-these-business-categories-came-about")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Comment les catégories d'entreprises ont été créées?":"How the business categories came about"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/inquiries-to-bay")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Demandes d'achat":"Inquiries to buy"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/one-more-thing")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Encore une chose":"One more thing"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/scam-alerts")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Alertes arnaques":"Scam alerts"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/circulation")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Circulation":"Circulation"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/faq")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"FAQ":"FAQ"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/rate-information")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Tarifs et information":"Rates & information"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("register")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Enregistrer mon entreprise":"Register my business"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/satisfaction-guarantee")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Satisfaction garantie":"Satisfaction guarantee"}}</a>
               </li>
               <li class="list-group-item">
                  <a href="{{url("page/why-have-a-profile")}}"><i class="far fa-arrow-alt-circle-right mr-2"></i>{{App::isLocale("fr")?"Quoi de neuf pour MY BUSINESS":"What's in it for MY-BUSINESS?"}}</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- Modal Click Here -->
<script>
   $(document).ready(function () {

   $('.first-button').on('click', function () {

   $('.animated-icon1').toggleClass('open');
   });
   $('.second-button').on('click', function () {

   $('.animated-icon2').toggleClass('open');
   });
   $('.third-button').on('click', function () {

   $('.animated-icon3').toggleClass('open');
   });
   });

   $.cookieMessage({
   'mainMessage': 'We use cookies to enhance your experience. By continuing to visit this site, you agree to our use of cookies. Learn more.  <a href="privacy">Learn more</a>. &nbsp;  &nbsp;  ',
   'acceptButton': 'Got it!',
   backgroundColor: '#FAE4DC',
   fontSize: '17px',
   fontColor: '#3e3e3e',
   btnBackgroundColor: '#B1040E',
   btnFontSize: '17px',
   btnFontColor: 'white',
   linkFontColor: '#E88663'
   });
</script>
<!-- Modal Language-->
<div class="modal fade" id="lng" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" onblur="$('.lng').css('margin-right','0px')">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="container-fluid">
               <div class="row">
                  <?php
                     $existedlangs = array(
                        "ar" => "Arabic","bn" => "Bengali","bu" => "Bulgarian","ch" => "Chinese","du" => "Dutch","en" => "English","es" => "Estonian","fa" => "Farsi","fi" => "Filipino","fr" => "French",
                        "ge" => "German","gr" => "Greek","he" => "Hebrew","hi" => "Hindi","in" => "Indonesian","it" => "Italian","ja" => "Japanese","ko" => "Korean","ma" => "Malaysian","no" => "Norwegian",
                        "pl" => "Polish","po" => "Portuguese","ro" => "Romanian","ru" => "Russian","sr" => "Serbian","sp" => "Spanish","th" => "Thai","tu" => "Turkish","uk" => "Ukranian","vi" => "Vietnamese"
                     );
                     $allowedlangs = explode(",",getInfos()->langs);

                     foreach($existedlangs as $k => $lng){
                        if(in_array($k, $allowedlangs)){ ?>
<div class="col-3 p-1 text-center">
                       <a href="{{url("lang/$k")}}" class="text-blue nav-link">
                          <img src="/assets/front_end/images/lng/<?=$k;?>.png" class="w-50">
                          <p><?=$lng;?></p>
                        </a>
                    </div>
                        <?php
                        }
                     }

                     ?>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
      $(".clickhide").click(function(){
         $("#hideme").toggleClass('hideme');
      });
   });
</script>
