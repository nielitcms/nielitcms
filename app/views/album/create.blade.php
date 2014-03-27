@extends('layout.backend')

@section('content')
<div class="col-sm-8">
	<h2><i class="glyphicon glyphicon-plus"></i> Create New Album</h2>
	<hr>

	<form action="/album/create" method="post">
		<div class="form-group">
			<label for="title" class="control-label">Title</label>
			<input class="form-control" type="text" name="title" id="title" value="" placeholder="Enter Album Name" />
			<span class="help-block">
				<p class="text-danger">{{$errors->first('title')}}</p>
			</span>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">description</label>
			<input class="form-control" type="text" name="description" id="description" value="" placeholder="Enter Description" />
			<span class="help-block">
				<p class="text-danger">{{$errors->first('description')}}</p>
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