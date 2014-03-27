@extends('layout.backend')

@section('content')
<div class="col-sm-8">
	<h2><i class="glyphicon glyphicon-plus"></i> Edit/Update Album</h2>
	<hr>

	<form action="/album/edit/{{$album->id}}" method="post">
		<div class="form-group">
			<label for="title" class="control-label"> Album Title</label>
			<input class="form-control" type="text" name="title" id="title" value="{{$album->title}}" />
			<span class="help-block">
				<p class="text-danger">{{$errors->first('title')}}</p>
			</span>
		</div>
		
		<div class="form-group">
			<button type="submit" name="create" value="Create" class="btn btn-primary">Edit / Update</button>
		</div>

		<div class="form-group">
			@if(Session::has('message'))
			<div class="alert alert-success">{{Session::get('message')}}</div>	
			@endif
		</div>
	</form>
</div>
@stop