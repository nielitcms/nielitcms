<!DOCTYPE html>
<html>
<head>
	<title>Administration Panel</title>

	<link href="{{asset('lib/bootstrap-3.1.1-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('templates/backend/css/dashboard.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('templates/backend/css/style.css')}}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{asset('lib/jquery/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/bootstrap-3.1.1-dist/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('templates/backend/js/script.js')}}"></script>
</head>
<body>
	@include('layout.backend-partial.header')

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				@include('layout.backend-partial.sidebar')
			</div>

			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>
