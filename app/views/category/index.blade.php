@extends('layout.backend')

@section('content')
<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-th-list"></i> Category List</h3>
	<hr>
	
	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif
	
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Category Name</th>				
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!$categories->count())
			<tr><td colspan="3" align="center"><i>Empty</i></td></tr>
			@endif
			
			@foreach ($categories as $key => $category)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$category->name}}</td>
				<td class="tools">
					<a title="Edit Category" href="{{url('category/edit', array($category->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete Category" href="{{url('category/delete', array($category->id))}}?page={{Input::get('page')}}" class="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>		
					
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{$categories->links()}}
</div>

@stop
