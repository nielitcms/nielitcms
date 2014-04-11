@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> Pages</h3>
	<hr>
	
	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Author</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!$pages->count())
			<tr><td colspan="5" align="center"><i>Empty</i></td></tr>
			@endif
			
			@foreach($pages as $key => $page)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$page->title}}</td>
				<td>{{$page->author->display_name}}</td>
				<td>
					@if($page->status == 'published')
					<span class="btn btn-success btn-xs">{{ucwords($page->status)}}</span>
					@else
					<span class="btn btn-warning btn-xs">{{ucwords($page->status)}}</span>
					@endif
				</td>
				<td>
					<a href="{{url('page/edit', array($page->id))}}" title="Edit Page" class="tooltip-top btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>

					<a onclick="return confirm('Are you sure?');" href="{{url('page/delete', array($page->id))}}" title="Delete Page" class="tooltip-top btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{$pages->links()}}
</div>
@stop
