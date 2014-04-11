@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> Posts</h3>
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
				<th>Category</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!$posts->count())
			<tr><td colspan="6" align="center"><i>Empty</i></td></tr>
			@endif
			
			@foreach($posts as $key => $post)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$post->title}}</td>
				<td>{{$post->author->display_name}}</td>
				<td>
					@if($post->status == 'published')
					<span class="btn btn-success btn-xs">{{ucwords($post->status)}}</span>
					@else
					<span class="btn btn-primary btn-xs">{{ucwords($post->status)}}</span>
					@endif
				</td>
				<td>{{implode(', ', $post->categories->lists('name'))}}</td>
				
				<td class="tools">
					<a title="Edit Post" href="{{url('post/edit', array($post->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete Post" href="{{url('post/delete', array($post->id))}}" class="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{$posts->links()}}
</div>
@stop
