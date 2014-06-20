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




<!-- test -->

<div id="side-marquee">
	<?php
	$sidebar_menus = Menu::where('position', '=', 'sidebar')
						->where('parent', '=', 0)
						->orderBy('display_order', 'asc')
						->get();
	?>
	@if($sidebar_menus->count())

	<hr>
	<b>Quick Links</b>
	<hr>
	<div class="sidebar-module">
		<div class="module-content">
			<ul>
			<marquee behavior="scroll" height="100" direction="up" scrollamount="2" scrolldelay= "10" onmouseover= "this.stop();" onmouseout= "this.start();">
				@foreach($sidebar_menus as $sidebar_menu)
				<li>
				
					<img alt="news animated" src="{{asset('templates/frontend/images/new-animated.gif')}}" style="width: 27px; height: 11px;">
					<a href="{{$sidebar_menu->url}}">{{$sidebar_menu->title}}<br></a>
					<?php
					$sidebar_menu_children = Menu::where('position', '=', 'sidebar')
						->where('parent', '=', $sidebar_menu->id)
						->orderBy('display_order', 'asc')
						->get();
					?>
					@if($sidebar_menu_children->count())
					<ul>
						@foreach($sidebar_menu_children as $sidebar_menu_child)
						<li><a href="{{$sidebar_menu_child->url}}">{{$sidebar_menu_child->title}}</a></li>
		            	@endforeach
					</ul>
					@endif
				</li>
				@endforeach
			</marquee>
			</ul>
		</div>
	</div>
	<hr>
	@endif
</div>

<!-- notice -->
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
<hr>

<!-- user query -->

<div id="user-query" >
@if(Session::has('query'))
	<div class="alert alert-success">{{Session::get('query')}}</div>	
@endif
<h5><u>ENTER YOUR QUERY HERE</u></h5>
	{{Form::open(array('url'=>'user/query', 'method'=>'post', 'class'=>'form-vertical'))}}
		<div class="form-group">
			<!-- {{Form::label('subject', 'Subject', array('class'=>'control-label'))}} -->
			{{Form::text('subject', Input::old('subject'), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'Enter Subject', 'title'=>'Subject'))}}
			
			@if($errors->has('subject'))
			<p class="help-block"><span class="text-danger">{{$errors->first('subject')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<!-- {{Form::label('qemail', 'Email', array('class'=>'control-label'))}} -->
			{{Form::text('qemail', Input::old('qemail'), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'Enter Email', 'title'=>'Email'))}}
			
			@if($errors->has('qemail'))
			<p class="help-block"><span class="text-danger">{{$errors->first('qemail')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<!-- {{Form::label('qtitle', 'Title', array('class'=>'control-label'))}} -->
			{{Form::text('qtitle', Input::old('qtitle'), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>'Enter Post Title', 'title'=>'Title'))}}
			
			@if($errors->has('qtitle'))
			<p class="help-block"><span class="text-danger">{{$errors->first('qtitle')}}</span></p>
			@endif
		</div>

		<div class="form-group" id="query">
			{{Form::label('query', 'Query', array('class'=>'control-label'))}}
			{{Form::textarea('query', Input::old('query'), array('class'=>'ckeditor input-sm form-control', 'rows'=>8))}}

			@if($errors->has('query'))
			<p class="help-block"><span class="text-danger">{{$errors->first('query')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<a href="{{url('/query')}}">Recent Queries</a>
		</div>

		{{Form::hidden('redirect_to', Request::url())}}

		<div class="form-group" >
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
		</div>
	{{Form::close()}}
</div>

<hr>




<!-- 
<?php 
	$comments=Comment::orderBy('created_at', 'desc')->get();
 ?> -->
<!-- @if($comments->count())
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
@endif -->