<!DOCTYPE html>
<html>
<head>
	<title>Welcome :: Administration</title>

	<link href="{{asset('lib/bootstrap-3.1.1-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('templates/backend/css/dashboard.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('templates/backend/css/style.css')}}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{asset('lib/jquery/jquery-1.11.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/bootstrap-3.1.1-dist/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('templates/frontend/js/script.js')}}"></script>
</head>
<body>
	<div class="nielit-nav navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="{{url('/')}}"><i class="glyphicon glyphicon-book"></i> NIELIT CMS Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Forgot Password</a></li>
            <li><a href="#">Forgot Username</a></li>
          </ul>
        </div>
      </div>
    </div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 main">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>
