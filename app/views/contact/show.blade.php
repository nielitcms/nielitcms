@extends('layout.frontend')

@section('content')
<div class="col-sm-12">
	<div class="row">
			<h3><i class="glyphicon glyphicon-th-list"></i> Contact List</h3>
			<hr>
			@if(Session::has('message'))
			<div class="alert alert-success">{{Session::get('message')}}</div>	
			@endif
			
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Name</th>				
						<th>Email</th>				
						<th>Contct Number</th>				
						<th>Designation</th>				
						<th>Category</th>				
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
					</tr>
					@endforeach
				</tbody>
			</table>

			{{$contacts->links()}}
		</div>
</div>

@stop
