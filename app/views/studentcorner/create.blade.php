@extends('layout.frontend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-plus"></i> Add New Article</h3>
	<hr>

	{{Form::open(array('url'=>'/student/add', 'method'=>'post', 'class'=>'form-vertical'))}}
		<div class="form-group">
			{{Form::label('title', 'Title', array('class'=>'control-label'))}}
			{{Form::text('title', Input::old('title'), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'Enter Post Title', 'title'=>'Post Title'))}}
			
			@if($errors->has('title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('content', 'Post Content', array('class'=>'control-label'))}}
			{{Form::textarea('content', Input::old('content'), array('class'=>'ckeditor input-sm form-control', 'rows'=>8))}}

			@if($errors->has('content'))
			<p class="help-block"><span class="text-danger">{{$errors->first('content')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
		</div>
	{{Form::close()}}
</div>
@stop