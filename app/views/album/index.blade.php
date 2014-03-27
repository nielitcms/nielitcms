@extends('layout.backend')

@section('content')
<div class="col-sm-12">
	<h2><i class="glyphicon glyphicon-list"></i> Album List</h2>
	<hr>

	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Album Title</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($albums as $album)
			<tr>
				<td>{{$albums->title}}</td>
				<td>{{$albums->description]}}</td>
				<td>
					<a href="{{url('album/edit')}}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="{{url('album/delete', array($album->id))}}" class="btn btn-danger btn-xs">
					<i class="glyphicon glyphicon-trash"></i> Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>	
</div>

@stop