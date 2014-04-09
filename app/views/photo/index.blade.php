@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> Photo List</h3>
	<hr>

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>File</th>
				<th>Created By</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($photos as $key => $photo)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$photo->title}}</td>
				<td><a href="{{url('photo/' . $photo->id)}}" target="_blank" class="btn btn-xs btn-primary">
					<i class="glyphicon glyphicon-download"></i> Downloads</a></td>
				<td>{{$photo->album->title}}</td>

				<td class="tools">
					<a title="Edit Photo" href="{{url('photo/edit', array($photo->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete Photo" href="{{url('photo/delete', array($photo->id))}}" class="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{$photos->links()}}
</div>
@stop
