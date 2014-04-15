@extends('layout.frontend')

@section('content')

<div class="col-sm-12">
	<h3>Contact Us</h3>
	<hr>

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<div class="col-sm-6">
		<div class="row">
			{{Form::open(array('url'=>'/contact', 'method'=>'post'))}}
				<div class="form-group">
					{{Form::text('user_email', Input::old('user_email'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'User Email Id', 'title'=>'User Email Id'))}}

					@if($errors->has('user_email'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('user_email')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">	
					{{Form::text('subject', Input::old('subject'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Subject', 'title'=>'Subject'))}}
					
					@if($errors->has('subject'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('subject')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::textarea('message_body', Input::old('message_body'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Type ur Message Here', 'title'=>'Message', 'rows'=>'6'))}}
					
					@if($errors->has('message_body'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('message_body')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-sm btn-primary">Submit</button>		
				</div>
			{{Form::close()}}
		</div>
	</div>

</div>
@stop
