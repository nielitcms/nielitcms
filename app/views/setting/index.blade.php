@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-cogs"></i> Setting</h3>
	<hr>

	<form class="form-vertical" action="/settings" method="post">
		<div class="form-group">
			{{Form::label('site_title', 'Site Title', array('class'=>'control-label'))}}
			{{Form::text('site_title', '', array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'Website Title', 'title'=>'Website Title'))}}
			
			@if($errors->has('site_title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('site_title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
		</div>
	</form>
</div>

@stop