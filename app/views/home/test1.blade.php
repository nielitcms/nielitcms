@extends('layout.frontend')

@section('content')

<?php 
// $content = Content::find(1);
// $content = Content::where('id','=','1')->first();
$content = Content::where('title','=','My News One')->first();
?>
<div>
	<h2>{{$content->title}}</h2>
	<h5>{{$content->author_id}}</h5>
	<p>{{$content->content}}</p>
</div>

@stop