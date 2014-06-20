@extends('layout.backend')

@section('content')
<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-7">
			
			<h3><i class="glyphicon glyphicon-th-list"></i> Contact List</h3>
			<hr>
			@if(Session::has('message'))
			<div class="alert alert-success">{{Session::get('message')}}</div>	
			@endif
			
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>				
						<th>Email</th>				
						<th>Contct Number</th>				
						<th>Designation</th>				
						<th>Category</th>				
						<th class="col-sm-2"></th>
					</tr>
				</thead>
				<tbody>
					@if(!$contacts->count())
					<tr><td colspan="3" align="center"><i>Empty</i></td></tr>
					@endif
					
					@foreach ($contacts as $key => $contact)
					<tr>
						<td>{{$key+$index}}</td>
						<td>{{$contact->name}}</td>
						<td>{{$contact->email}}</td>
						<td>{{$contact->contact}}</td>
						<td>{{$contact->designation}}</td>
						<td>{{$contact->category}}</td>
						<td class="tools">
							<a title="Edit Contact" href="{{url('admin/contact/edit', array($contact->id))}}" class="btn btn-warning btn-xs">
								<i class="glyphicon glyphicon-edit"></i>
							</a>
							
							<a onclick="return confirm('Are you sure?');" title="Delete Contact" href="{{url('admin/contact/delete', array($contact->id))}}?page={{Input::get('page')}}" class="btn btn-danger btn-xs">
								<i class="glyphicon glyphicon-trash"></i>
							</a>		
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			{{$contacts->links()}}
		</div>
	</div>
</div>

@stop
