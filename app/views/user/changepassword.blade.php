@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-cog"></i> Change Password For User ({{$user->username}})</h3>
	<hr>
	
	<div class="col-sm-6">
		<div class="row">
			{{Form::open(array('url'=>'/user/changepassword/' . $user->id, 'method'=>'post'))}}
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