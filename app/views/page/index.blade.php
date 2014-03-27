@extends('layout.backend')

@section('content')
@if(Session::has('message'))
<div class="col-sm-12">
@endif
	<h2><i class="glyphicon glyphicon-list", class="col-sm-9"></i> Page List</h2>
	<hr>
	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Author</th>
				<th>Category</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $page)
			<tr>
				<td>{{$page->id}}</td>
				<td>{{$page->title}}</td>
				<td>{{user::find($page->author_id)->username}}</td>
				
				<?php 
					$post=Postcategory::where('post_id','=',$page->id)->get();
				?>

				@foreach($post as $p)
				 	<td>{{Category::find($p->category_id)->name}}</td>
				@endforeach
				<td>
					<a href="{{url('page/edit', array($page->id))}}" class="btn btn-warning btn-xs">
					<i class="glyphicon glyphicon-pencil"></i> Edit</a>
					<a href="{{url('page/delete', array($page->id))}}" class="btn btn-danger btn-xs">
					<i class="glyphicon glyphicon-trash"></i> Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>	
</div>
@stop
