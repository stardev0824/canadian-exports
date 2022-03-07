<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      {{--    favicon--}}
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
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      {{--***********************--}}
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      {{--
      <title>{{ config('app.name', 'Laravel') }}</title>
      --}}
      <title>Canadian Exports | Canadian Products and Services</title>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link src="{{ asset('css/cus-style.css') }}" rel="stylesheet">
      {{--    <link rel="stylesheet" type="text/css" href="{{asset("assets/front_end/css/bootstrap.min.css")}}">--}}
      <link rel="stylesheet" href="{{asset("assets/front_end/css/style.css")}}">
      <meta name="description" content="Canadian Exports is a Canadian export portal and a directory of Canadian exporters, showcasing lists of Canadian products and services, and promoting Canadian manufacturers and exporters. Canadian Exports is a Canadian business directory and a Canadian business database highlighting the Canadian industry" />
      <meta name="keywords" content="Canadian Export, Export from Canada, Canada export, Export Canada, Exporting from Canada, Canada export catalogue, Canada export directory, Directory of, Canadian exporters, Canada business directory, Directory of Canadian companies, Directory of Canadian companies, Canada trade, Canadian trade, Canada export portal, Canada trade mission" />
        @yield('style')
   </head>
   <body>
      @include("layouts.partial.navbar")
      @yield("content")
      @include("layouts.partial.footer")
   </body>
</html>
