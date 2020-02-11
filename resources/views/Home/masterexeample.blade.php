<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Photo E-Commerce</title>
    <link href="{{asset('public/home')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/home')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('public/home')}}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{asset('public/home')}}/css/price-range.css" rel="stylesheet">
    <link href="{{asset('public/home')}}/css/animate.css" rel="stylesheet">
	<link href="{{asset('public/home')}}/css/main.css" rel="stylesheet">
	<link href="{{asset('public/home')}}/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('public/home')}}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/home')}}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/home')}}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/home')}}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/home')}}/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    @include('Home.includes.header')

    @if (\Request::is('/'))
	@include('Home.includes.slider')
        
    @endif
	

	
	<section>
		<div class="container">
			<div class="row">
                  
                        
                    <div class="col-sm-3">
                            @include('Home.includes.slidebar')
                    </div>	
                    <div class="col-sm-9 padding-right">
                
                        @yield('maincontent')
                    </div>
                 
				
			</div>
		</div>
	</section>
	
	@include('Home.includes.footer')

	

  
    <script src="{{asset('public/home')}}/js/jquery.js"></script>
	<script src="{{asset('public/home')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('public/home')}}/js/jquery.scrollUp.min.js"></script>
	<script src="{{asset('public/home')}}/js/price-range.js"></script>
    <script src="{{asset('public/home')}}/js/jquery.prettyPhoto.js"></script>
    <script src="{{asset('public/home')}}/js/main.js"></script>
</body>
</html>

