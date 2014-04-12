@extends('layout.frontend')

@section('content')
<div class="posts single">
	<div class="post">
		<h3 class="post-title">{{$post->title}}</h3>
		<div class="post-author">by {{$post->author->display_name}} on {{date('dS F, Y h:iA', strtotime($post->created_at))}}</div>
		<div class="post-content">{{$post->content}}</div>
		<div class="post-meta">Categories: {{implode(', ', $post->categories->lists('name'))}}</div>
	</div>
</div>

@stop