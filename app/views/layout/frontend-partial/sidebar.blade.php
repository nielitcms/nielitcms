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

<div class="sidebar-module">
	<h3 class="module-title">Notices</h3>
	<div class="module-content">
		<ul class="list-group">
			<li class="list-group-item">Cras justo odio</li>
			<li class="list-group-item">Dapibus ac facilisis in</li>
			<li class="list-group-item">Morbi leo risus</li>
			<li class="list-group-item">Porta ac consectetur ac</li>
			<li class="list-group-item">Vestibulum at eros</li>
		</ul>
	</div>
</div>

<div class="sidebar-module">
	<h3 class="module-title">Comments</h3>
	<div class="module-content">
		<ul class="list-group">
			<li class="list-group-item"><a href="/">Cras justo odio</a></li>
			<li class="list-group-item"><a href="/">Dapibus ac facilisis in</a></li>
			<li class="list-group-item"><a href="/">Morbi leo risus</a></li>
			<li class="list-group-item"><a href="/">Porta ac consectetur ac</a></li>
			<li class="list-group-item"><a href="/">Vestibulum at eros</a></li>
		</ul>
	</div>
</div>
