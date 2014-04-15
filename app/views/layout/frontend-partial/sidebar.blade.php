<div class="sidebar-module">
	<div class="module-content">
		{{Form::open(array('url'=>'search', 'method'=>'get', 'class'=>'form search-form'))}}
			<div class="form-group has-feedback">
		  		{{Form::text('query', Input::old('query'), array('placeholder'=>'Search', 'class'=>'form-control'))}}
		  		<span class="glyphicon glyphicon-search form-control-feedback"></span>
			</div>
		{{Form::close()}}
	</div>
</div>

<?php
$sidebar_menus = Menu::where('position', '=', 'sidebar')
					->where('parent', '=', 0)
					->orderBy('display_order', 'asc')
					->get();
?>
@if($sidebar_menus->count())
<div class="sidebar-module">
	<div class="module-content">
		<ul class="list-group">
			@foreach($sidebar_menus as $sidebar_menu)
			<li class="list-group-item">
				<a href="{{$sidebar_menu->url}}">{{$sidebar_menu->title}}</a>
				<?php
				$sidebar_menu_children = Menu::where('position', '=', 'sidebar')
					->where('parent', '=', $sidebar_menu->id)
					->orderBy('display_order', 'asc')
					->get();
				?>
				@if($sidebar_menu_children->count())
				<ul>
					@foreach($sidebar_menu_children as $sidebar_menu_child)
					<li>&rarr; <a href="{{$sidebar_menu_child->url}}">{{$sidebar_menu_child->title}}</a></li>
	            	@endforeach
				</ul>
				@endif
			</li>
			@endforeach
		</ul>
	</div>
</div>
@endif

<?php $notice_category_id = Setting::getData('sidebar_notice');?>
@if($notice_category_id != 0)
	<?php $notice_category = Category::find($notice_category_id); ?>
	@if($notice_category)
		<?php
		$notice_posts = Content::with('author','categories')
			->where('type', '=', 'post')
			->where(function($query){
				$notice_category_id = Setting::getData('sidebar_notice');
				$post_ids = ContentCategory::where('category_id', '=', $notice_category_id)->get()->lists('content_id');
				if(!empty($post_ids))
					$query->whereIn('id', $post_ids);
				else
					$query->whereIn('id', array(0));
			})
			->get()
			->take(5);
		?>
		@if($notice_posts->count())
		<div class="sidebar-module">
			<h3 class="module-title">{{$notice_category->name}}</h3>
			<div class="module-content">
				<ul class="list-group">
					@foreach($notice_posts as $notice_post)
					<li class="list-group-item">
						<a href="{{url('/post/' . $notice_post->id)}}">{{$notice_post->title}}</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif
	@endif
@endif


<?php 
	$comments=Comment::orderBy('created_at', 'desc')->get();
 ?>
@if($comments->count())
<div class="sidebar-module">
	<h3 class="module-title">Comment</h3>
	<div class="module-content">
		<ul class="list-group">
			@foreach($comments as $comment)
			<li class="list-group-item">
				<a href="{{url('/post/' . $comment->post_id .'#comments')}}">{{substr($comment->comment_body, 0, 80)}}</a>
			</li>
			@endforeach
		</ul>
	</div>
</div>
@endif