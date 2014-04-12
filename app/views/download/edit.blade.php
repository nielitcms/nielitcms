@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-edit"></i> Edit Download</h3>
	<hr>

	{{Form::open(array('url'=>'admin/download/edit/' . $download->id, 'method'=>'post', 'class'=>'form-vertical', 'enctype'=>'multipart/form-data'))}}
		<div class="form-group">
			{{Form::label('title', 'File Title', array('class'=>'control-label'))}}
			{{Form::text('title', Input::old('title', $download->title), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'File Title', 'title'=>'File Title'))}}
			
			@if($errors->has('title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('file_path', 'File', array('class'=>'control-label'))}}
			{{Form::file('file_path', array('class'=>'form-control input-sm'))}}

			<p class="help-block">Current File: <a href="{{url('download/' . $download->id)}}" target="_blank">{{url($download->file_path)}}</a></p>
			@if($errors->has('file_path'))
			<p class="help-block"><span class="text-danger">{{$errors->first('file_path')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('status', 'Status', array('class'=>'control-label'))}}
			{{Form::select('status', array('inactive'=>'Inactive', 'active'=>'Active'), Input::old('status', $download->status), array('class'=>'tooltip-left input-sm form-control', 'title'=>'Select Download Status'))}}

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