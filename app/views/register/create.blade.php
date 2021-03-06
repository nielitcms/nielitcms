@extends('layout.frontend')

@section('content')

<div class="col-sm-12">
	<h3>Register Account</h3>
	<hr>

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<div class="col-sm-6">
		<div class="row">
			{{Form::open(array('url'=>'/register', 'method'=>'post'))}}
				<div class="form-group">
					{{Form::text('username', Input::old('username'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Username', 'title'=>'Username'))}}

					@if($errors->has('username'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('username')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">	
					{{Form::text('display_name', Input::old('display_name'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Display Name', 'title'=>'Display Name'))}}
					
					@if($errors->has('display_name'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('display_name')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::password('password', array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Password', 'title'=>'Password'))}}
					
					@if($errors->has('password'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('password')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::password('repeat_password', array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Repeat Password', 'title'=>'Repeat Password'))}}
					
					@if($errors->has('repeat_password'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('repeat_password')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::text('email', Input::old('email'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Email Id', 'title'=>'Email Id'))}}

					@if($errors->has('email'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('email')}}</p>
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
