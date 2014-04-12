@extends('layout.frontend')

@section('content')

<!-- Banner Slider Start -->
<?php $banner_image = Setting::getData('banner_image'); ?>
@if($banner_image != 0)
	<?php $album = Album::find($banner_image); ?>
	@if($album)
		<?php $photos = Photo::where('album_id', '=', $album->id)->get(); ?>

		@if($photos->count())
		<div id="homepage_slider" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		  	@for($k=1;$k <= $photos->count();$k++)
		  		@if($k == 1)
		    	<li data-target="#homepage_slider" data-slide-to="{{$k}}" class="active"></li>
		    	@else
		    	<li data-target="#homepage_slider" data-slide-to="{{$k}}"></li>
		    	@endif
		    @endfor
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    
		    @foreach($photos as $key => $photo)
		    <div class="item {{$key == 0?'active':''}}">
		      <img src="{{asset($photo->photo_path)}}" alt="{{$photo->title}}">
		      <div class="carousel-caption">{{$photo->title}}</div>
		    </div>
		    @endforeach

		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#homepage_slider" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		  </a>
		  <a class="right carousel-control" href="#homepage_slider" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		  </a>
		</div>
		@endif
	@endif
@endif
<!-- Banner Slider Ends -->

<!-- Latest Post Start -->
<div class="posts">
	<h2>Latest Posts</h2>
	@foreach($latest_posts as $latest_post)
	<div class="post">
		<h3 class="post-title"><a href="{{url('post/' . $latest_post->id)}}">{{$latest_post->title}}</a></h3>
		<div class="post-author">by {{$latest_post->author->display_name}} on {{date('dS F, Y h:iA', strtotime($latest_post->created_at))}}</div>
		<div class="post-content">{{substr($latest_post->content, 0, 400)}}... <a href="{{url('post/' . $latest_post->id)}}" class="readmore">Read More</a></div>
		<div class="post-meta">Categories: {{implode(', ', $latest_post->categories->lists('name'))}}</div>
	</div>
	@endforeach
</div>
<!-- Latest Post End -->

@stop