<div class="nielit-nav navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
	  	<div class="navbar-header">
	    
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>

		    <a class="navbar-brand" href="{{url('/')}}"><i class="glyphicon glyphicon-book"></i> {{Setting::getData('admin_site_title')}}</a>
	  	</div>
	  	<div class="navbar-collapse collapse">
	    	<ul class="nav navbar-nav navbar-right">
		      	<li {{(Request::path() == 'admin')?'class="active"':''}}>
		      		<a href="/admin">Dashboard</a>
		      	</li>
		      	<li {{(Request::path() == 'admin/settings')?'class="active"':''}}>
		      		<a href="/admin/settings">Settings</a>
		      	</li>
		      	<li {{(Request::path() == 'admin/profile')?'class="active"':''}}>
		      		<a href="/admin/profile">Profile</a>
		      	</li>
		      	<li {{(Request::path() == 'admin/profile/change-password')?'class="active"':''}}>
		      		<a href="/admin/profile/change-password">Change Password</a>
		      	</li>
		      	<li {{(Request::path() == 'logout')?'class="active"':''}}>
		      		<a href="/logout">Logout</a>
		      	</li>
	    	</ul>
	  	</div>
	</div>
</div>