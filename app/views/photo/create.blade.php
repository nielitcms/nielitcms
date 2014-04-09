@extends('layout.backend')

@section('content')

@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-plus"></i> Add Photos</h3>
	<hr>

	{{Form::open(array('url'=>'photo/add/'. $id, 'method'=>'post', 'class'=>'form-vertical', 'enctype'=>'multipart/form-data'))}}
		<div class="form-group">
			{{Form::label('title', 'File Title', array('class'=>'control-label'))}}
			{{Form::text('title', Input::old('title'), array('class'=>'form-control input-sm tooltip-left', 
			'placeholder'=>'File Title', 'title'=>'File Title'))}}
			
			@if($errors->has('title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('photo_path', 'File', array('class'=>'control-label'))}}
			{{Form::file('photo_path', array('class'=>'form-control input-sm'))}}

			@if($errors->has('photo_path'))
			<p class="help-block"><span class="text-danger">{{$errors->first('photo')}}</span></p>
			@endif
		</div>


		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
		</div>
	{{Form::close()}}
</div>


@stop















