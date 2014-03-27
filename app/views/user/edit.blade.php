@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-edit"></i> Edit User ({{$user->username}})</h3>
	<hr>

	<div class="col-sm-6">
		<div class="row">
			{{Form::open(array('url'=>'/user/edit/' . $user->id, 'method'=>'post'))}}
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
					{{Form::select('role', array(''=>'Select Role', 'administrator'=>'Administrator', 'editor'=>'Editor'), Input::old('role', $user->role), array('class'=>'input-sm form-control tooltip-right', 'title'=>'Role'))}}
					
					@if($errors->has('role'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('role')}}</p>
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
