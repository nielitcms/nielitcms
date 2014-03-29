@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> Downloads</h3>
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
				<th>Status</th>
				<th>Created By</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($downloads as $key => $download)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$download->title}}</td>
				<td><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-download"></i> Download</a></td>
				<td>
					@if($download->status == 'active')
					<span class="btn btn-success btn-xs">{{ucwords($download->status)}}</span>
					@else
					<span class="btn btn-warning btn-xs">{{ucwords($download->status)}}</span>
					@endif
				</td>
				<td>{{$download->creator->display_name}}</td>

				<td class="tools">
					<a title="Edit Download" href="{{url('download/edit', array($download->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete Download" href="{{url('download/delete', array($download->id))}}" class="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{$downloads->links()}}
</div>
@stop
