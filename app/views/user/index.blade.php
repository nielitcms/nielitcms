@extends('layout.backend')

@section('content')
<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-th-list"></i> User List</h3>
	<hr>
	
	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif
	
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>User Name</th>
				<th>Display Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!$users->count())
			<tr><td colspan="7" align="center"><i>Empty</i></td></tr>
			@endif
			@foreach ($users as $key => $user)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$user->username}}</td>
				<td>{{$user->display_name}}</td>
				<td>{{$user->email}}</td>
				<td>{{ucwords($user->role)}}</td>
				<td>{{ucwords($user->status)}}</td>
				<td class="tools">
					<a title="Edit User" href="{{url('user/edit', array($user->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete User" href="{{url('user/delete', array($user->id))}}?page={{Input::get('page')}}" class="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
					
					<a title="Change Password" href="{{url('user/changepassword', array($user->id))}}" class="btn btn-primary btn-xs">
						<i class="glyphicon glyphicon-cog"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{$users->links()}}
</div>

@stop
