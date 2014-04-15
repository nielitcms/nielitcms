@extends('layout.frontend')

@section('content')
<div class="posts single">
	<div class="post">
		<h3 class="post-title">{{$post->title}}</h3>
		<div class="post-author">by {{$post->author->display_name}} on {{date('dS F, Y h:iA', strtotime($post->created_at))}}</div>
		<div class="post-content">{{$post->content}}</div>
		<div class="post-meta">Categories: {{implode(', ', $post->categories->lists('name'))}}</div>
	</div>

	<div class="social">
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
		<a class="addthis_button_preferred_1"></a>
		<a class="addthis_button_preferred_2"></a>
		<a class="addthis_button_preferred_3"></a>
		<a class="addthis_button_preferred_4"></a>
		<a class="addthis_button_compact"></a>
		<a class="addthis_counter addthis_bubble_style"></a>
		</div>
		<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-534d349e10e5a8ca"></script>
		<!-- AddThis Button END -->
	</div>

	<div class="comment">
		<h4><i class="glyphicon glyphicon-comment"></i> Comment List</h4>
		<ul id='comments' class="comment-list">
		@foreach($post->comments as $comment)
			<li>
				<span class="comment-meta">&rarr; {{$comment->author->display_name}} on {{date('dS F Y, h:iA', strtotime($comment->created_at))}}</span>
				<pre class="comment-body">{{$comment->comment_body}}</pre>
			</li>
		@endforeach
		</ul>

		@if(Auth::check() && Content::inCategory($post->categories->lists('id')))
		<div class="comment-form">
			<h4><i class="glyphicon glyphicon-pencil"></i> Your Comment</h4>
			{{Form::open(array('url'=>url('post/' . $post->id . '/comment/'), 'method'=>'post', 'class'=>'form-vertical'))}}
				<div class="form-group">
					{{Form::textarea('comment_body', '', array('class'=>'form-control input-sm', 'rows'=>'4'))}}
				</div>
				<div class="form-group text-right">
					{{Form::button('Comment', array('class'=>'btn btn-sm btn-primary', 'type'=>'submit'))}}
				</div>
			{{Form::close()}}
		</div>
		@endif
		
	</div>

</div>

@stop