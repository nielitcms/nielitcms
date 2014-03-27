@extends('layout.backend')

@section('content')
<div class="col-sm-12">	
	<H2><i class="glyphicon glyphicon-list", class="col-sm-9"></i> Category List</H2>
	<hr>
	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
	@endif

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Category Name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cats as $cat)
			<tr>
				<td>{{$cat->id}}</td>
				<td>{{$cat->name}}</td>
				<td>				
				<a href="{{url('category/edit', array($cat->id))}}" class="btn btn-warning btn-xs">
				<i class="glyphicon glyphicon-pencil"></i> Edit</a>	
				<a href="{{url('category/delete', array($cat->id))}}" class="btn btn-danger btn-xs">
				<i class="glyphicon glyphicon-trash"></i> Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop