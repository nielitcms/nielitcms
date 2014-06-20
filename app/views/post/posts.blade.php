@extends('layout.frontend')

@section('content')
<div class="posts">
	<h2>{{$name}}
	@if($name=='student corner')
		<a title="Add article" href="{{url('/student/add')}}" class="btn btn-success btn-xs pull-right">
			<i class="glyphicon glyphicon-plus"></i> ADD ARTICLE
		</a>
	@endif
	</h2>

	@if($name=='latest post')
		<?php 
			$latest_posts = Content::with('author', 'categories')
			->where('type', '=', 'post')
			->where('status', '=', 'published')
			->orderBy('created_at', 'desc')
			->get()->take(Setting::getdata('no_of_post'));
		?>
		@foreach($latest_posts as $latest_post)
			@if(implode(', ', $latest_post->categories->lists('name'))!=Setting::getData('student_corner_category'))
				@if(implode(', ', $latest_post->categories->lists('name'))!=Setting::getData('news_category'))
					<div class="post">
						<h3 class="post-title"><a href="{{url('post/' . $latest_post->id)}}">{{$latest_post->title}}</a></h3>
						<div class="post-author">by {{$latest_post->author->display_name}} on {{date('dS F, Y h:iA', strtotime($latest_post->created_at))}}</div>
						<div class="post-content">{{substr($latest_post->content, 0, 400)}}... <a href="{{url('post/' . $latest_post->id)}}" class="readmore">Read More</a></div>
						<div class="post-meta">Categories: {{implode(', ', $latest_post->categories->lists('name'))}}</div>
					</div>

				@endif
			@endif
		@endforeach
	@else
				@if($name=='student corner')
		<?php $category = 'student_corner_category';?>
	@elseif($name=='news')
		<?php $category = 'news_category';?>
	@endif
	<?php $student_corner_id = Setting::getData($category);?>
	@if($student_corner_id != 0)
	<?php $notice_category = Category::find($student_corner_id); ?>
		@if($notice_category)

		@if($name=='student corner')
			<?php
			$notice_posts = Content::with('author','categories')
				->where('type', '=', 'post')
				->where(function($query){
					$student_corner_id = Setting::getData('student_corner_category');
					$post_ids = ContentCategory::where('category_id', '=', $student_corner_id)->get()->lists('content_id');
					if(!empty($post_ids))
						$query->whereIn('id', $post_ids);
					else
						$query->whereIn('id', array(0));
				})
				->get()
				->take(5);
			?>
		@elseif($name=='news')
			<?php
			$notice_posts = Content::with('author','categories')
				->where('type', '=', 'post')
				->where(function($query){
					$student_corner_id = Setting::getData('news_category');
					$post_ids = ContentCategory::where('category_id', '=', $student_corner_id)->get()->lists('content_id');
					if(!empty($post_ids))
						$query->whereIn('id', $post_ids);
					else
						$query->whereIn('id', array(0));
				})
				->get()
				->take(5);
			?>
		@endif

			
			@if($notice_posts->count())
				@foreach($notice_posts as $student)
					<div class="post">
						<h3 class="post-title"><a href="{{url('post/' . $student->id)}}">{{$student->title}}</a></h3>
						<div class="post-author">by {{$student->author->display_name}} on {{date('dS F, Y h:iA', strtotime($student->created_at))}}</div>
						<div class="post-content">{{substr($student->content, 0, 400)}}... <a href="{{url('post/' . $student->id)}}" class="readmore">Read More</a></div>
						<div class="post-meta">Categories: {{implode(', ', $student->categories->lists('name'))}}</div>
					</div>
				@endforeach
			@endif
		@endif
	@endif
	@endif
</div>
@stop
