<div class="header">
	<div class="container">
		<div class="logo">
			@if(Auth::check())
			<p class="user-panel">Hello, {{Auth::user()->display_name}}. <a href="{{url('signout')}}" title="Logout" class="tooltip-right"><i class="glyphicon glyphicon-off"></i></a></p>
			@else
			{{Form::open(array('url'=>url('login'), 'method'=>'post', 'class'=>'form-inline pull-right'))}}
				{{Form::text('username', '', array('class'=>'form-control input-sm', 'placeholder'=>'Username'))}}
				{{Form::password('password', array('class'=>'form-control input-sm', 'placeholder'=>'Password'))}}
				{{Form::hidden('redirect_to', Request::url())}}
				{{Form::submit('Sign In', array('class'=>'btn btn-sm btn-success', 'name'=>'signin'))}}
				<p class="help-block text-left"><a href="{{url('/register')}}">Register Account</a></p>
				@if(Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif

			{{Form::close()}}
			@endif

			<!-- <a href="{{url('/')}}"><img src="{{asset('templates/frontend/images/logo.png')}}" width="140px" height="60px" alt="{{Setting::getData('site_title')}}" title="{{Setting::getData('site_title')}}"></a>
			 --><a href="{{url('/')}}"><img src="{{asset('templates/frontend/images/logo.png')}}" width="750px" height="100px" alt="{{Setting::getData('site_title')}}" title="{{Setting::getData('site_title')}}"></a>

		</div>
	</div>
</div>
<div class="top-navigation">
	<div class="container">
		<div class="row">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<?php
					$top_menus = Menu::where('position', '=', 'top')
						->where('parent', '=', 0)
						->orderBy('display_order', 'asc')
						->get();

					$current_url = Request::url();
					?>
					@foreach($top_menus as $top_menu)
					<?php
					$top_menu_children = Menu::where('position', '=', 'top')
						->where('parent', '=', $top_menu->id)
						->orderBy('display_order', 'asc')
						->get();
					?>
					<li class="{{$current_url == $top_menu->url?'active':''}}">
						@if($top_menu_children->count())
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$top_menu->title}} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							@foreach($top_menu_children as $top_menu_child)
			            	<li>
			            		<a href="{{$top_menu_child->url}}">{{$top_menu_child->title}}</a>
			            	</li>
			            	@endforeach
			          	</ul>
			          	@else
			          	<a href="{{$top_menu->url}}">{{$top_menu->title}}</a>
			          	@endif
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>