@extends('layout.frontend')

@section('content')
<div class="posts">
	<h2>Gallery</h2>

	<div class="col-sm-12 album-list">
		@if(!$albums->count())
			<tr><td colspan="2" align="center"><p class="">There are no items</p></td></tr>
		@else
			<div class="row">
				@foreach($albums as $key => $album)
				<?php $photo = Photo::where('album_id', '=', $album->id)->first(); ?>
				<div class="col-sm-4 album">
					<a href="{{url('album/photo', array($album->id))}}">
						@if($photo)
						<span class="album-cover"><img src="{{asset($photo->photo_path)}}" height="200px" width="auto" /></span>
						@else
						<span class="album-cover">No Photo</span>
						@endif
						<span class="album-title">{{$album->title}}</span>
					</a>
				</div>
				@if( ($key+1)%3 == 0)
				</div>
				<div class="row">
				@endif
				@endforeach
			</div>
		@endif
	</div>

	<div class="col-sm-12">
		<div class="row">{{$albums->links()}}</div>
	</div>

</div>
@stop

