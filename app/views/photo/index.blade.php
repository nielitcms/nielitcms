@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3>
		<i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> {{$album->title}} &raquo; Photo List
		<a title="Add Photo" href="{{url('admin/photo/add', array($album->id))}}" class="btn btn-success btn-xs pull-right">
			<i class="glyphicon glyphicon-plus"></i> ADD PHOTO
		</a>
	</h3>
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
				<th>File</th>
				<th>Album Name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!$photos->count())
			<tr><td colspan="5" align="center"><i>Empty</i></td></tr>
			@endif
			
			@foreach($photos as $key => $photo)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$photo->title}}</td>
				<td>{{$photo->description}}</td>
				<td><a href="{{url('admin/photo/' . $photo->id)}}" target="_blank" class="btn btn-xs btn-primary">
					<i class="glyphicon glyphicon-download"></i> Downloads</a></td>
				<td>{{$photo->album->title}}</td>

				<td class="tools">
					<a data-toggle="modal" data-target="#myModal{{$photo->id}}" title="View Photo" href="{{url('admin/photo/show', array($photo->id))}}" class="btn btn-success btn-xs">
						<i class="glyphicon glyphicon-eye-open"></i>
					</a>

					<!-- Modal -->
					<div class="modal fade" id="myModal{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">{{$photo->title}}</h4>
								</div>
								<div class="modal-body text-center">
									<img width="550px" src="{{asset($photo->photo_path)}}" title="{{$photo->title}}" alt="{{$photo->title}}" />
								</div>
							</div>
						</div>
					</div>

					<a title="Edit Photo" href="{{url('admin/photo/edit', array($photo->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete Photo" href="{{url('admin/photo/delete', array($photo->id))}}?page={{Input::get('page')}}" class="btn btn-danger btn-xs">
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
