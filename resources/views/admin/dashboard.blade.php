@extends("admin.layouts.app")


@section("title","Dashboard")

@push("css")


@endpush
@section("content")
        <div class="container-fluid">
    <!-- Counter Examples -->
            <div class="block-header">
                <h2>
                     Canadian Exports dashboard
                </h2>
            </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
                <div class="icon">
                    <i class="material-icons">shopping_cart</i>
                </div>
                <div class="content">
                    <div class="text">Items (inquiries to buy)</div>
                    <div class="number count-to" data-from="0" data-to="{{count(getAllItems(0))}}" data-speed="1000" data-fresh-interval="20">125</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-indigo">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">Members</div>
                    <div class="number count-to" data-from="0" data-to="{{count(\App\User::all())}}" data-speed="1000" data-fresh-interval="20">257</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-purple">
                <div class="icon">
                    <i class="material-icons">bookmark</i>
                </div>
                <div class="content">
                    <div class="text">Business profile</div>
                    <div class="number count-to" data-from="0" data-to="{{count(\App\Profile::all())}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-deep-purple">
                <div class="icon">
                    <i class="material-icons">check_box</i>
                </div>
                <div class="content">
                    <div class="text">Categories</div>
                    <div class="number count-to" data-from="0" data-to="{{count(\App\Category::all())}}" data-speed="1500" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-deep-purple">
                <div class="icon">
                    <i class="material-icons">favorite</i>
                </div>
                <div class="content">
                    <div class="text">Testimonials</div>
                    <div class="number count-to" data-from="0" data-to="{{count(\App\Testimonial::all())}}" data-speed="1500" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-blue">
                <div class="icon">
                    <i class="material-icons">account_balance</i>
                </div>
                <div class="content">
                    <div class="text">Members premium</div>
                    <div class="number count-to" data-from="0" data-to="{{count(\App\User::where("expired_at",">",now())->get())}}" data-speed="1000" data-fresh-interval="20">257</div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan">
                <div class="icon">
                    <i class="material-icons">picture_as_pdf</i>
                </div>
                <div class="content">
                    <div class="text">Issues</div>
                    <div class="number count-to" data-from="0" data-to="{{count(getAllIssues())}}" data-speed="1000" data-fresh-interval="20">257</div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-teal">
                <div class="icon">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">Banners</div>
                    <div class="number count-to" data-from="0" data-to="{{count(getAllBanAndSpo("banner"))}}" data-speed="1000" data-fresh-interval="20">257</div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-deep-orange">
                <div class="icon">
                    <i class="material-icons">face</i>
                </div>
                <div class="content">
                    <div class="text">Sponsor</div>
                    <div class="number count-to" data-from="0" data-to="{{count(getAllBanAndSpo("sponsor"))}}" data-speed="1000" data-fresh-interval="20">257</div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-blue-grey">
                <div class="icon">
                    <i class="material-icons">comment</i>
                </div>
                <div class="content">
                    <div class="text">Comments</div>
                    <div class="number count-to" data-from="0" data-to="{{count(\App\Comment::all())}}" data-speed="1000" data-fresh-interval="20">257</div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-brown">
                <div class="icon">
                    <i class="material-icons">supervisor_account</i>
                </div>
                <div class="content">
                    <div class="text">Admin account</div>
                    <div class="number count-to" data-from="0" data-to="{{count(\App\Admin::all())}}" data-speed="1000" data-fresh-interval="20">257</div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-black">
                <div class="icon">
                    <i class="material-icons">event</i>
                </div>
                <div class="content">
                    <div class="text">Events</div>
                    <div class="number count-to" data-from="0" data-to="{{count(getAllEvents())}}" data-speed="1000" data-fresh-interval="20">257</div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Counter Examples -->
        </div>
        @endsection


@push("js")
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset("assets/back_end")}}/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset("assets/back_end")}}/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <script src="{{asset("assets/back_end/js/pages/widgets/infobox/infobox-2.js")}}"></script>

@endpush
