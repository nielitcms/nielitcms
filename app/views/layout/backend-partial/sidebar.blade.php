<ul class="nav nav-sidebar">
	<li {{(Request::path() == 'admin')?'class="active"':''}}>
		<a href="/admin">	
			<span class="glyphicon glyphicon-dashboard"></span> Dashboard
		</a>
	</li>
</ul>

<ul class="nav nav-sidebar">
	<li {{(Request::path() == 'post/create')?'class="active"':''}}>
		<a href="{{url('post/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Add Post
		</a>
	</li>
	<li {{(Request::path() == 'post')?'class="active"':''}}>
		<a href="{{url('post')}}">
			<span class="glyphicon glyphicon-list"></span> Posts	
		</a>
	</li>
	<li {{(Request::path() == 'category/create')?'class="active"':''}}>
		<a href="{{url('category/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Add Category	
		</a>
	</li>
	<li>
		<a href="{{url('category')}}">
			<span class="glyphicon glyphicon-list"></span> Categories	
		</a>
	</li>
</ul>

<ul class="nav nav-sidebar">
	<li {{(Request::path() == 'page/create')?'class="active"':''}}>
		<a href="{{url('page/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Create New Page
		</a>
	</li>
	<li {{(Request::path() == 'page')?'class="active"':''}}>
		<a href="{{url('page')}}">
			<span class="glyphicon glyphicon-list"></span> Page List	
		</a>
	</li>
</ul>

<ul class="nav nav-sidebar">
	<li>
		<a href="{{url('user/create')}}">
			<span class="glyphicon glyphicon-plus"></span> Add User
		</a>
	</li>
	<li>
		<a href="{{url('user')}}">
			<span class="glyphicon glyphicon-list"></span> Users	
		</a>
	</li>
</ul>


