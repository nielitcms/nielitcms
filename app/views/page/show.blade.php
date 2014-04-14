@extends('layout.frontend')

@section('content')
<div class="posts single">
	<div class="post">
		<h3 class="post-title">{{$page->title}}</h3>
		<div class="post-author">by {{$page->author->display_name}} on {{date('dS F, Y h:iA', strtotime($page->created_at))}}</div>
		<div class="post-content">{{$page->content}}</div>
	</div>
</div>

@stop