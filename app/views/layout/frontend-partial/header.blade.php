<div class="header">
	<div class="container">
		<div class="logo">
			<a href="{{url('/')}}"><img src="{{asset('templates/frontend/images/logo.jpg')}}" width="214px" height="94px" alt="{{Setting::getData('site_title')}}" title="{{Setting::getData('site_title')}}"></a>
		</div>
	</div>
</div>
<div class="top-navigation">
	<div class="container">
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


<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
				<span class="glyphicon glyphicon-phone-alt"></span>
				{{Setting::getData('site_title')}}
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