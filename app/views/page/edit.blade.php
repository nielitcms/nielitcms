@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-edit"></i> Edit Page</h3>
	<hr>

	{{Form::open(array('url'=>'admin/page/edit/'.$page->id, 'method'=>'post', 'class'=>'form-vertical'))}}
			<div class="form-group">
			{{Form::label('title', 'Title', array('class'=>'control-label'))}}
			{{Form::text('title', Input::old('title', $page->title), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'Enter Page Title', 'title'=>'Page Title'))}}
			
			@if($errors->has('title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('content', 'Page Content', array('class'=>'control-label'))}}
			{{Form::textarea('content', Input::old('content', $page->content), array('class'=>'ckeditor input-sm form-control', 'rows'=>8))}}

			@if($errors->has('content'))
			<p class="help-block"><span class="text-danger">{{$errors->first('content')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('status', 'Status', array('class'=>'control-label'))}}
			{{Form::select('status', array('draft'=>'Draft', 'published'=>'Published'),  Input::old('status', $page->status), array('class'=>'tooltip-left input-sm form-control', 'title'=>'Select Publish Status'))}}

			@if($errors->has('status'))
			<p class="help-block"><span class="text-danger">{{$errors->first('status')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Save</button>
		</div>
	{{Form::close()}}
</div>

@stop