@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-wrench"></i> Setting</h3>
	<hr>

	<form class="form-vertical" action="/settings" method="post">
		<div class="form-group">
			{{Form::label('site_title', Setting::getTitle('site_title'), array('class'=>'control-label'))}}
			{{Form::text('site_title', Input::old('site_title', Setting::getData('site_title')), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'Website Title', 'title'=>'Website Title'))}}
			
			@if($errors->has('site_title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('site_title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('admin_site_title', Setting::getTitle('admin_site_title'), array('class'=>'control-label'))}}
			{{Form::text('admin_site_title', Input::old('admin_site_title', Setting::getData('admin_site_title')), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'Administation Site Title', 'title'=>'Administation Site Title'))}}
			
			@if($errors->has('admin_site_title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('admin_site_title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
		</div>
	</form>
</div>

@stop