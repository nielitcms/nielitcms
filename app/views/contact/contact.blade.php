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
					{{Form::text('name', Input::old('name'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Your Name', 'title'=>'Your Name'))}}

					@if($errors->has('name'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('name')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::text('email', Input::old('email'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Your Email Address', 'title'=>'Your Email Address'))}}

					@if($errors->has('email'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('email')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::text('contact', Input::old('contact'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Phone Number (Optional)', 'title'=>'Your Phone Number'))}}
					
					@if($errors->has('contact'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('contact')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::textarea('message', Input::old('message'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Your Message', 'title'=>'Enter Your Message', 'rows'=>'6'))}}
					
					@if($errors->has('message]'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('message')}}</p>
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
