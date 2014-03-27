@extends('layout.backend')

@section('content')

<div class="col-sm-8">
	<h2><i class="glyphicon glyphicon-user"></i>  User Account</h2>
	<hr>
	<p class="help-block">Fill up the textbox below</p>
	<form action="/user/edit/{{$user->id}}" method="post" >
		
		<div class="form-group">
			<label for="username" class="control-label">Username</label>
			<input class="form-control" type="text" name="username" id="username" value="{{$user->username}}" />
			<span class="help-block">
				<p class="text-danger">{{$errors->first('username')}}</p>
			</span>
		</div>

		<div class="form-group">	
			<label for="display_name" class="control-label">Display Name</label>
			<input class="form-control" type="text" name="display_name" id="display_name" value="{{$user->display_name}}" />
			<span class="help-block">
				<p class="text-danger">{{$errors->first('display_name')}}</p>
			</span>
		</div>

		
		<div class="form-group">
			<label for="role" class="control-label">Role</label>
			<select name="role" id="role" class="form-control">
				<option {{($user->role=='administrator')?'selected="selected"':''}} value="administrator">Administrator</option>
				<option {{($user->role=='editor')?'selected="selected"':''}} value="editor">Editor</option>
			</select>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon"></span> Edit / Update</button>		
			
			@if(Session::has('message'))
			<div class="alert alert-success">{{Session::get('message')}}</div>	
			@endif
		</div>	

	</form>

</div>
@stop

<!-- <div class="col-sm-6">
	<h2><i class="glyphicon glyphicon-user"></i> Create New User Account</i></h2>
	<span class="help-block"><center>Fill up the textbox for creating new user </center></span>
	<hr>
	<form role="form">
		<div class="form-group">
			<label for="exampleInputEmail1">Email Address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
		</div>
		
		<div class="form-group">
			<label for="exampleInputPassword1">Enter Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
		</div>

		<div class="form-group">
			<label for="exampleInputFile">File Input</label>
			<input type="File" id="exampleInputFile">
			<p class="help-block">Example block-level help here</p>
		</div>

		<div class="checkbox">
			<label>
				<input type="checkbox"> Check me out
			</label>
		</div>
		<button type="submit" class="bnt bnt-primary">Submit <span class="glyphicon glyphicon-play"></span></button>

	</form>
</div>
 -->


	
<!-- <h2><i class="glyphicon glyphicon-star-empty"></i> Create New User</h2>
<hr>
<form action="/postuser" method="post" class="form-horizontal">
	
	<div class="form-group">
		<label for="username" class="col-sm-3 control-label">Username</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="username" id="username" value="" />
		</div>
	</div>

	<div class="form-group">	
		<label for="display_name" class="col-sm-3 control-label">Display Name</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="display_name" id="display_name" value="" />
		</div>
	</div>

	<div class="form-group">
		<label for="password" class="col-sm-3 control-label">Password</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="password" id="password" value="" />
		</div>
	</div>

	<div class="form-group">
		<label for="role" class="col-sm-3 control-label">Role</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="role" id="role" value="" />			
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-6">
			<button type="submit" class="btn btn-primary"> 
				Sign In <span class="glyphicon glyphicon-play"></span>
			</button>			
		</div>		
	</div>		
</form>
 -->
