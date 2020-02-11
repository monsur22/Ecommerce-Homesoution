<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content=" Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce Prodject</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/home')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/home')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/home')}}/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/home')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/home')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/home')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/home')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/home')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('public/home')}}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Header Section Begin -->
    @include('Home.includes.header')

    <!-- Header End -->

    <!-- Hero Section Begin -->
    @if (\Request::is('/'))
	@include('Home.includes.slider')
        
    @endif
    <!-- Hero Section End -->

    @yield('maincontent')

    <!-- Footer Section Begin -->
	@include('Home.includes.footer')

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('public/home')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('public/home')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('public/home')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('public/home')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('public/home')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('public/home')}}/js/jquery.zoom.min.js"></script>
    <script src="{{asset('public/home')}}/js/jquery.dd.min.js"></script>
    <script src="{{asset('public/home')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('public/home')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('public/home')}}/js/main.js"></script>
</body>

</html>