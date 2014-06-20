@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> Queries</h3>
	<hr>
	
	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Subject</th>
				<th>Email</th>
				<th>Title</th>
				<th>Query</th>
				<th>Response</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!$query->count())
			<tr><td colspan="5" align="center"><i>Empty</i></td></tr>
			@endif
			
			@foreach($query as $key => $page)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$page->subject}}</td>
				<td>{{$page->email}}</td>
				<td>{{$page->title}}</td>
				<td>{{$page->query}}</td>
				<td>{{$page->response}}</td>
				<td class="tools">
					<a title="Response" href="{{url('admin/query', array($page->id))}}" class="btn btn-success btn-xs">
						<i class="glyphicon glyphicon-eye-open"></i>
					</a>
					<a onclick="return confirm('Are you sure?');" href="{{url('admin/query/delete', array($page->id))}}?page={{Input::get('page')}}" title="Delete Query" class="tooltip-top btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{$query->links()}}
</div>
@stop
