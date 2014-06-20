@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-plus"></i> Create New Contact</h3>
	<hr>

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<div class="col-sm-6">
		<div class="row">
			{{Form::open(array('url'=>'/admin/contact/edit/'.$contact->id, 'method'=>'post'))}}
				<div class="form-group">
					{{Form::text('name', Input::old('name', $contact->name), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Name', 'title'=>'Name'))}}

					@if($errors->has('name'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('name')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::text('email', Input::old('email', $contact->email), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Email Address', 'title'=>'Email Address'))}}

					@if($errors->has('email'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('email')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::text('contact', Input::old('contact', $contact->contact), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Contact Number ', 'title'=>'Contact Number'))}}
					
					@if($errors->has('contact'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('contact')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::text('designation', Input::old('designation', $contact->designation), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Designation', 'title'=>'Enter Designation'))}}
					
					@if($errors->has('designation'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('designation')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::select('category', array('non-teaching'=>'Non-Teaching', 'teaching'=>'Teaching'),  Input::old('category', $contact->category), array('class'=>'tooltip-right input-sm form-control', 'title'=>'Select category'))}}

					@if($errors->has('category'))
					<p class="help-block"><span class="text-danger">{{$errors->first('category')}}</span></p>
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

