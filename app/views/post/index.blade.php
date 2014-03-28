@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-list", class="col-sm-9"></i> Post List</h3>
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
				<th>Category</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{{$post->id}}</td>
				<td>{{$post->title}}</td>
				<td>{{$post->author->display_name}}</td>
				<td>
					<?php // $categories = Postcategory::where('post_id','=',$post->id)->get(); ?>
					{{--@foreach($categories as $p)--}}
				 	{{--(Category::find($p->category_id)->name)--}}
					{{-- @endforeach--}}
				</td>
				
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
</div>
@stop
