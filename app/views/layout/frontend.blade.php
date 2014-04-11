<!DOCTYPE html>
<html>
<head>
	<title>Welcome :: Homepage</title>

	<link href="{{asset('lib/bootstrap-3.1.1-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('templates/frontend/css/style.css')}}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{asset('lib/jquery/jquery-1.11.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/bootstrap-3.1.1-dist/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('templates/frontend/js/script.js')}}"></script>
	<link type="text/css" href="{{asset('lib/fonts/bebasneue_regular_macroman/stylesheet.css')}}" rel="stylesheet" />
</head>
<!-- <body onload="sayHello()"> -->
<body>
	@include('layout.frontend-partial.header')

	<div class="main-area">
		<div class="container">
			<div class="row">
				<div class="col-md-9" id="main">@yield('content')</div>
				<div class="col-md-3" id="sidebar">
					@include('layout.frontend-partial.sidebar')
				</div>
			</div>
		</div>
	</div>

	@include('layout.frontend-partial.footer')
</body>
</html>