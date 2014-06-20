@extends('layout.login')

@section('content')
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<h3>Change Password</h3>
		<hr>
		@if(Session::has('message'))
			<div class="alert alert-danger">{{Session::get('message')}}</div>
		@endif

		<div class="row">
			{{Form::open(array('url'=>'/admin/resetpassword/'.$token, 'method'=>'post'))}}
				<div class="form-group">
					{{Form::password('password', array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'New Password', 'title'=>'New Password'))}}
					
					@if($errors->has('password'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('password')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::password('repeat_password', array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Repeat New Password', 'title'=>'Repeat New Password'))}}
					
					@if($errors->has('repeat_password'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('repeat_password')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-sm btn-primary">Save</button>		
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop
