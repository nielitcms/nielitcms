@extends('layout.frontend')

@section('content')
<div class="posts">
	<h2>{{$category->name}}</h2>
	@if($posts->count())
		@foreach($posts as $post)
		<div class="post">
			<h3 class="post-title"><a href="{{url('post/' . $post->id)}}">{{$post->title}}</a></h3>
			<div class="post-author">by {{$post->author->display_name}} on {{date('dS F, Y h:iA', strtotime($post->created_at))}}</div>
			<div class="post-content">{{substr($post->content, 0, 400)}}... <a href="{{url('post/' . $post->id)}}" class="readmore">Read More</a></div>
			<div class="post-meta">Categories: {{implode(', ', $post->categories->lists('name'))}}</div>
		</div>
		@endforeach
	@else
	<div class="post">
		<div class="post-content">Currently there are no items to display in {{$category->name}}.</div>
	</div>
	@endif
</div>
@stop