
<ul class="nav nav-sidebar">
	<li {{(Request::path() == 'admin')?'class="active"':''}}>
		<a href="/admin">	
			<span class="glyphicon glyphicon-dashboard"></span> Dashboard
		</a>
	</li>
	@if(in_array(Auth::user()->role, array('user')))
	
	@else

	@if(in_array(Auth::user()->role, array('administrator')))
	<li {{(Request::path() == 'admin/menu/list/top')?'class="active"':''}}>
		<a href="{{url('admin/menu/list/top')}}">
			<span class="glyphicon glyphicon-tasks"></span> Top Menu
		</a>
	</li>
	<li {{(Request::path() == 'admin/menu/list/bottom')?'class="active"':''}}>
		<a href="{{url('admin/menu/list/bottom')}}">
			<span class="glyphicon glyphicon-tasks"></span> Bottom Menu
		</a>
	</li>
	<li {{(Request::path() == 'admin/menu/list/sidebar')?'class="active"':''}}>
		<a href="{{url('admin/menu/list/sidebar')}}">
			<span class="glyphicon glyphicon-tasks"></span> Sidebar Menu	
		</a>
	</li>
	@endif
</ul>

<ul class="nav nav-sidebar">
	<li {{(Request::path() == 'admin/post/create')?'class="active"':''}}>
		<a href="{{url('admin/post/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Add Post
		</a>
	</li>
	<li {{(Request::path() == 'admin/post')?'class="active"':''}}>
		<a href="{{url('admin/post')}}">
			<span class="glyphicon glyphicon-list"></span> Posts	
		</a>
	</li>
	<li {{(Request::path() == 'admin/category')?'class="active"':''}}>
		<a href="{{url('admin/category')}}">
			<span class="glyphicon glyphicon-list"></span> Categories	
		</a>
	</li>
</ul>

<ul class="nav nav-sidebar">
	<li {{(Request::path() == 'admin/page/create')?'class="active"':''}}>
		<a href="{{url('admin/page/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Add Page
		</a>
	</li>
	<li {{(Request::path() == 'admin/page')?'class="active"':''}}>
		<a href="{{url('admin/page')}}">
			<span class="glyphicon glyphicon-list"></span> Page	
		</a>
	</li>
</ul>

<ul class="nav nav-sidebar">
	<li {{(Request::path() == 'admin/download/create')?'class="active"':''}}>
		<a href="{{url('admin/download/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Add Download
		</a>
	</li>
	<li {{(Request::path() == 'admin/download')?'class="active"':''}}>
		<a href="{{url('admin/download')}}">
			<span class="glyphicon glyphicon-list"></span> Downloads
		</a>
	</li>
</ul>

<ul class="nav nav-sidebar">
	<li {{(Request::path() == 'admin/album/create')?'class="active"':''}}>
		<a href="{{url('admin/album/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Add Album
		</a>
	</li>
	<li {{(Request::path() == 'admin/album')?'class="active"':''}}>
		<a href="{{url('admin/album')}}">
			<span class="glyphicon glyphicon-list"></span> Albums	
		</a>
	</li>
</ul>


<ul class="nav nav-sidebar">
	@if(in_array(Auth::user()->role, array('administrator')))
	<li {{(Request::path() == 'admin/user/create')?'class="active"':''}}>
		<a href="{{url('admin/user/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Add User
		</a>
	</li>
	<li {{(Request::path() == 'admin/user')?'class="active"':''}}>
		<a href="{{url('admin/user')}}">
			<span class="glyphicon glyphicon-list"></span> Users	
		</a>
	</li>
	@endif
	@endif
</ul>

