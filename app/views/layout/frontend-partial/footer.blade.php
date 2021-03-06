<nav class="navbar navbar-default footer-navigation" role="navigation">
  	<div class="container" id="footer">
    	<div class="row">
            <button class="go-to-top" onclick="return goToTop();">
            <a href="{{url('/')}}"><img src="{{asset('templates/frontend/images/go-to-top.png')}}" width="30px" height="30px"></a>
            </button>
            <?php
            $bottom_menus = Menu::where('position', '=', 'bottom')->orderBy('display_order', 'asc')->get();
            ?>

            @if($bottom_menus->count())
    		<ul class="nav">
                @foreach($bottom_menus as $menu)
                <li><a href="{{$menu->url}}">{{$menu->title}}</a></li>
                @endforeach
    		</ul>
            @endif
    		<p>{{Setting::getData('footer_copyright_text')}}</p>
    	</div>
  	</div>
</nav>