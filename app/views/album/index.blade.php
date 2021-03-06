@extends('layout.backend')

@section('content')
<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-th-list"></i> Album List</h3>
	<hr>	

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
	@endif

	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Description</th>
				<th>Photos</th>
				<th>Created By</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!$albums->count())
			<tr><td colspan="6" align="center"><i>Empty</i></td></tr>
			@endif
			
			@foreach ($albums as $key => $album)
			<tr>
				<td>{{$key+$index}}</td>
				<td><a href="{{url('admin/album/photo', array($album->id))}}">{{$album->title}}</a></td>
				<td>{{$album->description}}</td>
				<td><a href="{{url('admin/album/photo', array($album->id))}}">{{$album->photos->count()}}</a></td>
				<td>{{$album->creator->display_name}}</td>
				<td class="tools">
					<a title="Edit Album" href="{{url('admin/album/edit', array($album->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a title="Add Photo" href="{{url('admin/photo/add', array($album->id))}}" class="btn btn-success btn-xs">
						<i class="glyphicon glyphicon-plus"></i>
					</a>
					
					<a title="Photo List" href="{{url('admin/album/photo', array($album->id))}}" class="btn btn-primary btn-xs">
						<i class="glyphicon glyphicon-picture"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete Album" href="{{url('admin/album/delete', array($album->id))}}?page={{Input::get('page')}}" class="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>	
	{{$albums->links()}}
</div>

@stop
	