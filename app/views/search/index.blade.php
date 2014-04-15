@extends('layout.frontend')

@section('content')

<!-- Latest Post Start -->
<div class="posts">
	<h2>Search Results</h2>
	<ol>
		@foreach($contents as $content)
			<li class="post">
				<span class="pull-right label label-default">{{strtoupper($content->type)}}</span>
				<a target="_blank" href="{{url('post/' . $content->id)}}">{{$content->title}}</a>
			</li>
		@endforeach

		@foreach($downloads as $download)
			<li class="post">
				<span class="pull-right label label-primary">DOWNLOAD</span>
				<a target="_blank" href="{{url('download' , $download->id)}}">{{$download->title}}</a>
			</li>
		@endforeach

		@foreach($albums as $album)
			<li class="post">
				<span class="pull-right label label-info">ALBUM</span>
				<a target="_blank" href="{{url('album/photo' , $album->id)}}">{{$album->title}}</a>
			</li>
		@endforeach

		@foreach($photos as $photo)
			<li class="post">
				<span class="pull-right label label-success">PHOTO</span>
				<a target="_blank" href="{{asset($photo->photo_path)}}">{{$photo->title}}</a>
			</li>
		@endforeach
	</ol>
</div>
<!-- Latest Post End -->

@stop