<!DOCTYPE html>
<html>
<head>
	<title>Welcome :: Homepage</title>

	<link href="{{asset('lib/bootstrap-3.1.1-dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('templates/frontend/css/style.css')}}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{asset('lib/jquery/jquery-1.11.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/bootstrap-3.1.1-dist/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('templates/frontend/js/script.js')}}"></script>
</head>
<!-- <body onload="sayHello()"> -->
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">
					<span class="glyphicon glyphicon-phone-alt"></span>
					NIELIT, Aizawl
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">Home</a></li>
					<li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <b class="caret"></b></a>
			          	<ul class="dropdown-menu">
			            	<li><a href="#">Action</a></li>
			            	<li><a href="#">Another action</a></li>
			            	<li><a href="#">Something else here</a></li>
			            	<li class="divider"></li>
			            	<li><a href="#">Separated link</a></li>
			            	<li class="divider"></li>
			            	<li><a href="#">One more separated link</a></li>
			          	</ul>
			        </li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="main-area">
		<div class="container">
			<div class="row">
				<div class="col-md-9" id="main">@yield('content')</div>
				<div class="col-md-3" id="sidebar">
					<ul class="list-group">
						<li class="list-group-item">Cras justo odio</li>
						<li class="list-group-item">Dapibus ac facilisis in</li>
						<li class="list-group-item">Morbi leo risus</li>
						<li class="list-group-item">Porta ac consectetur ac</li>
						<li class="list-group-item">Vestibulum at eros</li>
					</ul>

					<ul class="list-group">
						<li class="list-group-item">Cras justo odio</li>
						<li class="list-group-item">Dapibus ac facilisis in</li>
						<li class="list-group-item">Morbi leo risus</li>
						<li class="list-group-item">Porta ac consectetur ac</li>
						<li class="list-group-item">Vestibulum at eros</li>
					</ul>

					<ul class="list-group">
						<li class="list-group-item">Cras justo odio</li>
						<li class="list-group-item">Dapibus ac facilisis in</li>
						<li class="list-group-item">Morbi leo risus</li>
						<li class="list-group-item">Porta ac consectetur ac</li>
						<li class="list-group-item">Vestibulum at eros</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
	  	<div class="container" id="footer">
	    	<div class="row">
	    		<p>Copyright &copy; 2014, Nielit,Aizawl, Mizoram</p>
	    	</div>
	  	</div>
	</nav>
</body>
</html>