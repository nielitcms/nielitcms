@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-edit"></i> Query Response</h3>
	<hr>

	{{Form::open(array('url'=>'admin/query/'.$query->id, 'method'=>'post', 'class'=>'form-vertical'))}}
			<div class="form-group">
			{{Form::label('subject', 'Subject', array('class'=>'control-label'))}} <br>
			{{Form::label('subject', $query->subject, array('class'=>'control-label'))}} <br>
			</div>

			<div class="form-group">
			{{Form::label('email', 'Email', array('class'=>'control-label'))}} <br>
			{{Form::label('email', $query->email, array('class'=>'control-label'))}} <br>
			</div>

			<div class="form-group">
			{{Form::label('title', 'Title', array('class'=>'control-label'))}} <br>
			{{Form::label('title', $query->title, array('class'=>'control-label'))}} <br>
			</div>

			<div class="form-group">
			{{Form::label('query', 'Query', array('class'=>'control-label'))}} <br>
			{{Form::label('query', $query->query, array('class'=>'control-label'))}} <br>
			</div>

			<div class="form-group">
				{{Form::label('response', 'Response', array('class'=>'control-label'))}}
				{{Form::textarea('response', Input::old('response'), array('class'=>'ckeditor input-sm form-control', 'rows'=>8))}}

				@if($errors->has('response'))
				<p class="help-block"><span class="text-danger">{{$errors->first('response')}}</span></p>
				@endif
			</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Save</button>
		</div>
			
	{{Form::close()}}
</div>

@stop