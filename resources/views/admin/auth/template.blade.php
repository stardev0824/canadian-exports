
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Canadian Exports Admin Template</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset("assets/back_end/plugins/bootstrap/css/bootstrap.css")}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset("assets/back_end/plugins/node-waves/waves.css")}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset("assets/back_end/plugins/animate-css/animate.css")}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset("assets/back_end/css/style.css")}}" rel="stylesheet">
</head>

<body class="{{Request::is("admin/login")?"login-page":"fp-page"}}">


@yield("content")

<!-- Jquery Core Js -->
<script src="{{asset("assets/back_end/plugins/jquery/jquery.min.js")}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset("assets/back_end/plugins/bootstrap/js/bootstrap.js")}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset("assets/back_end/plugins/node-waves/waves.js")}}"></script>

<!-- Validation Plugin Js -->
<script src="{{asset("assets/back_end/plugins/jquery-validation/jquery.validate.js")}}"></script>

<!-- Custom Js -->
<script src="{{asset("assets/back_end/js/admin.js")}}"></script>
<script src="{{asset("assets/back_end/js/pages/examples/sign-in.js")}}"></script>
</body>

</html>

