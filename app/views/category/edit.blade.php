@extends('layout.backend')

@section('content')
<div class="col-sm-4">
	<h2><i class="glyphicon glyphicon-pencil"></i> Edit / Update Category</h2>
	<hr>

	<form action="/category/edit/{{$category->id}}" method="post">
		<!-- <div class="form-group">
			<label for="id" class="control-label">id</label>
			<input class="form-control" type="text" name="id" id="id" value="{{$category->id}}" />
			<span class="help-block">
				<p class="text-danger">{{$errors->first('id')}}</p>				
			</span>
		</div> -->
		<div class="form-group">
			<label for="name" class="control-label"> Category Name</label>
			<input class="form-control" type="text" name="name" id="name" value="{{$category->name}}" />
			<span class="help-block">
				<p class="text-danger">{{$errors->first('name')}}</p>
			</span>
		</div>
		
		<div class="form-group">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon"></span> Edit / Update</button>
		</div>

		<div class="form-group">
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
