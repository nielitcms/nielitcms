@extends('layout.frontend')

@section('content')
<div class="posts singlealbum">
	<h2>Gallery</h2>
	<h3 class="album-title">{{$albumname}}</h3>

	<div class="col-sm-12 photo-list">
		<div class="row">
			@foreach($photos as $key => $photo)
			<div class="col-sm-4 photo">
				<a data-toggle="modal" title="{{$photo->title}}" data-target="#myModal{{$photo->id}}" href="{{asset($photo->photo_path)}}">
					<span class="photo-cover"><img src="{{asset($photo->photo_path)}}" height="200px" width="auto" /></span>
					<span class="photo-title">{{$photo->title}}</span>
				</a>
			</div>
			@if( ($key+1)%3 == 0)
			</div>
			<div class="row">
			@endif
			@endforeach
		</div>
	</div>

</div>
@stop