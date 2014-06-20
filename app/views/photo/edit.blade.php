@extends('layout.backend')

@section('content')

@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-edit"></i> <a href="/album/photo/{{$photo->album_id}}">{{$album->title}}</a> &raquo; Edit Photo</h3>
	<hr>

	{{Form::open(array('url'=>'admin/photo/edit/'. $photo->id, 'method'=>'post', 'class'=>'form-vertical', 'enctype'=>'multipart/form-data'))}}
		<div class="form-group">
			{{Form::label('title', 'File Title', array('class'=>'control-label'))}}
			{{Form::text('title', Input::old('title',$photo->title), array('class'=>'form-control input-sm tooltip-left', 
			'placeholder'=>'File Title', 'title'=>'File Title'))}}
			
			@if($errors->has('title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('description', 'File Description', array('class'=>'control-label'))}}
			{{Form::text('description', Input::old('description',$photo->description), array('class'=>'form-control input-sm tooltip-left', 
			'placeholder'=>'File Description', 'description'=>'File Description'))}}
			
			@if($errors->has('description'))
			<p class="help-block"><span class="text-danger">{{$errors->first('description')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Save</button>
		</div>
	{{Form::close()}}
</div>


@stop















