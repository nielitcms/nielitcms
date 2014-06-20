@extends('layout.frontend-main')

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
		      <img src="{{asset($photo->photo_path)}}" height="200" width="1200" alt="{{$photo->description}}">
		      <div class="carousel-caption" >{{$photo->description}}</div>
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



@stop
<!-- Banner Slider Ends -->

<!-- Latest Post Start -->

@section('content1')
	<div class="posts">
	<?php $news_category_id = Setting::getData('news_category');?>
	
	@if($news_category_id != 0)
		<h2>NEWS</h2>
		<?php $notice_category = Category::find($news_category_id); ?>
		@if($notice_category)
			<?php
			$notice_posts = Content::with('author','categories')
						->where('type', '=', 'post')
						->where('status', '=', 'published')
						->where(function($query){
							$news_category_id = Setting::getData('news_category');
							$post_ids = ContentCategory::where('category_id', '=', $news_category_id)->get()->lists('content_id');
							if(!empty($post_ids))
								$query->whereIn('id', $post_ids);
							else
								$query->whereIn('id', array(0));
							})
						->orderBy('created_at', 'desc')
						->get()
						->take(5);
			?>
			@if($notice_posts->count())
				<?php $count=0; ?>
				@foreach($notice_posts as $news)
					<?php $count++; ?>
					<div class="post">
						<h3 class="post-title"><a href="{{url('post/' . $news->id)}}">{{$news->title}}</a></h3>
						<div class="post-author">by {{$news->author->display_name}} on {{date('dS F, Y h:iA', strtotime($news->created_at))}}</div>
						<div class="post-content">{{substr($news->content, 0, 400)}}... <a href="{{url('post/' . $news->id)}}" class="readmore">Read More</a></div>
						<div class="post-meta">Categories: {{implode(', ', $news->categories->lists('name'))}}</div>
					</div>
					@if($count>=Setting::getData('no_of_item_perpage'))
						<a href="{{url('/view/news')}}">OLDER POSTS</a>
						<?php break ?>
					@endif
				@endforeach
			@endif
		@endif
	@endif
	</div>
<!-- Latest Post End -->
@stop

@section('content2')
	<div class="posts">
	<h2>LATEST POSTS</h2>
	<?php $count=0; ?>
	@foreach($latest_posts as $latest_post)
		@if(implode(', ', $latest_post->categories->lists('name'))!='news')
			@if(implode(', ', $latest_post->categories->lists('name'))!='student')
				<?php $count++; ?>
				<div class="post">
					<h3 class="post-title"><a href="{{url('post/' . $latest_post->id)}}">{{$latest_post->title}}</a></h3>
					<div class="post-author">by {{$latest_post->author->display_name}} on {{date('dS F, Y h:iA', strtotime($latest_post->created_at))}}</div>
					<div class="post-content">{{substr($latest_post->content, 0, 400)}}... <a href="{{url('post/' . $latest_post->id)}}" class="readmore">Read More</a></div>

					<div class="post-meta">Categories: {{implode(', ', $latest_post->categories->lists('name'))}}</div>
				</div>

			@endif
		@endif
		@if($count>=Setting::getData('no_of_item_perpage'))
			<a href="{{url('/view/latest post')}}">OLDER POST</a>
			<?php break ?>
		@endif
	@endforeach
</div>
@stop

@section('content3')
<div class="posts">
	<?php $student_corner_id = Setting::getData('student_corner_category');?>
	@if($student_corner_id != 0)
	<h2>Student Corner</h2>
	<?php $notice_category = Category::find($student_corner_id); ?>
		@if($notice_category)
			<?php
			$notice_posts = Content::with('author','categories')
				->where('type', '=', 'post')
				->where('status', '=', 'published')
				->where(function($query){
					$student_corner_id = Setting::getData('student_corner_category');
					$post_ids = ContentCategory::where('category_id', '=', $student_corner_id)->get()->lists('content_id');
					if(!empty($post_ids))
						$query->whereIn('id', $post_ids);
					else
						$query->whereIn('id', array(0));
				})
				->orderBy('created_at', 'desc')
				->get()
				->take(5);
			?>
			@if($notice_posts->count())
				<?php $count=0; ?>
				@foreach($notice_posts as $student)
					<?php $count++; ?>
					<div class="post">
						<h3 class="post-title"><a href="{{url('post/' . $student->id)}}">{{$student->title}}</a></h3>
						<div class="post-author">by {{$student->author->display_name}} on {{date('dS F, Y h:iA', strtotime($student->created_at))}}</div>
						<div class="post-content">{{substr($student->content, 0, 400)}}... <a href="{{url('post/' . $student->id)}}" class="readmore">Read More</a></div>

						<div class="post-meta">Categories: {{implode(', ', $student->categories->lists('name'))}}</div>
					</div>
					@if($count>=Setting::getData('no_of_item_perpage'))
						<a href="{{url('/view/student corner')}}">OLDER POSTS</a>
						<?php break ?>
					@endif
				@endforeach
			@endif
		@endif
	@endif
</div>
@stop
