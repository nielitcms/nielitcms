@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-edit"></i> Edit User ({{$user->username}})</h3>
	<hr>

	<div class="col-sm-6">
		<div class="row">
			{{Form::open(array('url'=>'admin/user/edit/' . $user->id, 'method'=>'post'))}}
				<div class="form-group">
					{{Form::text('username', Input::old('username', $user->username), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Username', 'title'=>'Username'))}}

					@if($errors->has('username'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('username')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">	
					{{Form::text('display_name', Input::old('display_name', $user->display_name), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Display Name', 'title'=>'Display Name'))}}
					
					@if($errors->has('display_name'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('display_name')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::text('email', Input::old('email', $user->email), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Email Id', 'title'=>'Email Id'))}}

					@if($errors->has('email'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('email')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::select('role', array(''=>'Select Role', 'administrator'=>'Administrator', 'editor'=>'Editor', 'user'=>'User'), Input::old('role', $user->role), array('class'=>'input-sm form-control tooltip-right', 'title'=>'Role'))}}
					
					@if($errors->has('role'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('role')}}</p>
					</span>
					@endif
				</div>

				<div class="form-group">
					{{Form::select('status', array(''=>'Select Status', 'pending'=>'Pending', 'active'=>'Active', 'inactive'=>'Inactive' ), Input::old('status', $user->status), array('class'=>'input-sm form-control tooltip-right', 'title'=>'Status'))}}
					
					@if($errors->has('status'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('status')}}</p>
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
