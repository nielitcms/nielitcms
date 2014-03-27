@extends('layout.login')

@section('content')
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<h3>Login</h3>
		<hr>

		@if(Session::has('message'))
		<div class="alert alert-danger">{{Session::get('message')}}</div>
		@endif

		<form action="login" method="post" role="form">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" class="input-sm form-control" name="username" placeholder="Enter user name" />
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" class="input-sm form-control" name="password" placeholder="Enter password" />		
			</div>
			<button type="submit" class="btn btn-primary">Sign in</button>
		</form>
	</div>
</div>
@stop