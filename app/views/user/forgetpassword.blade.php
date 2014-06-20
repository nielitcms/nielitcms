@extends('layout.login')

@section('content')


<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<h3>Login</h3>
		<hr>

		@if(Session::has('message'))
		<div class="alert alert-danger">{{Session::get('message')}}</div>
		@endif

		<form action="/admin/forgetpassword" method="post" role="form">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" id="email" class="input-sm form-control" name="email" placeholder="Enter Email" />
			</div>
			<button type="submit" class="btn btn-primary">Reset</button>
		</form>
	</div>
</div>
@stop