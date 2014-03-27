@extends('layout.backend')
@section('content')
<div class="col-sm-8">
	<h2><i class="glyphicon glyphicon-plus"></i> Create New Category</h2>
	<hr>

	<form action="/category/create" method="post">
		<div class="form-group">
			<label for="name" class="control-label">Name</label>
			<input class="form-control" type="text" name="name" id="name" value="" placeholder="Enter category name" />
			<span class="help-block">
				<p class="text-danger">{{$errors->first('name')}}</p>
			</span>
		</div>
		
		<div class="form-group">
			<button type="submit" name="create" value="Create" class="btn btn-primary">Create</button>
		</div>

		<div class="form-group">
			@if(Session::has('message'))
			<div class="alert alert-success">{{Session::get('message')}}</div>	
			@endif
		</div>
	</form>
</div>
@stop