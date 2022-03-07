<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" sizes="57x57" href="{{asset("assets/favicon")}}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset("assets/favicon")}}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("assets/favicon")}}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/favicon")}}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("assets/favicon")}}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset("assets/favicon")}}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset("assets/favicon")}}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset("assets/favicon")}}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("assets/favicon")}}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset("assets/favicon")}}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("assets/favicon")}}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("assets/favicon")}}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/favicon")}}/favicon-16x16.png">
    <link rel="manifest" href="{{asset("assets/favicon")}}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset("assets/back_end/plugins/bootstrap/css/bootstrap.css")}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset("assets/back_end/plugins/node-waves/waves.css")}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset("assets/back_end/plugins/animate-css/animate.css")}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset("assets/back_end/plugins/morrisjs/morris.css")}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset("assets/back_end/css/style.css")}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset("assets/back_end/css/themes/all-themes.css")}}" rel="stylesheet" />


    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @stack('css')
</head>
<body class="{{Request::is('admin*')?'theme-blue':'theme-red'}}">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->

<!-- Top Bar -->
@include("admin.layouts.partial.top_bar")
<!-- #Top Bar -->

<section>
    <!-- Left Sidebar -->
@include("admin.layouts.partial.left_side_bar")
<!-- #END# Left Sidebar -->
</section>

<section class="content">
    @yield("content")
</section>

<!-- Jquery Core Js -->
<script src="{{asset("assets/back_end/plugins/jquery/jquery.min.js")}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset("assets/back_end/plugins/bootstrap/js/bootstrap.js")}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset("assets/back_end/plugins/bootstrap-select/js/bootstrap-select.js")}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset("assets/back_end/plugins/jquery-slimscroll/jquery.slimscroll.js")}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset("assets/back_end/plugins/node-waves/waves.js")}}"></script>


<!-- Custom Js -->
<script src="{{asset("assets/back_end/js/admin.js")}}"></script>

<!-- Demo Js -->
<script src="{{asset("assets/back_end/js/demo.js")}}"></script>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script>

    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error(
        "{{$error}}",
        "error",
        {
            "closeButton" : true,
            "newestOnTop" : true,
            "progressBar" : true,
            "showDuration" : "500",
            "hideDuration" : "1000",
            "timeOut" : "10000",
        }
    );
    @endforeach
    @endif
</script>
@stack("js")
</body>
</html>
