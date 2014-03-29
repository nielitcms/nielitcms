@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-plus"></i> Add New Post</h3>
	<hr>

	<form class="form-vertical" action="/post/create" method="post">
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
			{{Form::label('category', 'Category', array('class'=>'control-label'))}}
			{{Form::select('category[]', $categories,  Input::old('category'), array('class'=>'tooltip-left input-sm form-control', 'multiple'=>'multiple', 'title'=>'Select categories'))}}
			<p class="help-block">Press and hold CTRL to select multiple categories</p>

			@if($errors->has('category'))
			<p class="help-block"><span class="text-danger">{{$errors->first('category')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('status', 'Status', array('class'=>'control-label'))}}
			{{Form::select('status', array('draft'=>'Draft', 'published'=>'Published'),  Input::old('status'), array('class'=>'tooltip-left input-sm form-control', 'title'=>'Select Publish Status'))}}

			@if($errors->has('status'))
			<p class="help-block"><span class="text-danger">{{$errors->first('status')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
		</div>
	</form>
</div>

@stop