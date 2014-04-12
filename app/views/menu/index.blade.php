@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	@if($menulocation == 'top')
	<h3>
		<i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> Top Menu List
		<a title="Add Top Menu" href="{{url('menu/create/top')}}" class="btn btn-success btn-xs pull-right">
			<i class="glyphicon glyphicon-plus"></i> ADD TOP MENU
		</a>
	</h3>
	<hr>
	@elseif($menulocation == 'bottom')
	<h3>
			<i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> Bottom Menu List
		<a title="Add Top Menu" href="{{url('menu/create/bottom')}}" class="btn btn-success btn-xs pull-right">
			<i class="glyphicon glyphicon-plus"></i> ADD BOTTOM MENU
		</a>
	</h3>
	<hr>
	@elseif($menulocation == 'sidebar')
	<h3>
		<i class="glyphicon glyphicon-th-list", class="col-sm-9"></i> Sidebar Menu List
		<a title="Add Top Menu" href="{{url('menu/create/sidebar')}}" class="btn btn-success btn-xs pull-right">
			<i class="glyphicon glyphicon-plus"></i> ADD SIDEBAR MENU
		</a>
	</h3>
	<hr>
	@endif

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Url</th>
				<th>Parent</th>
				<th>Display Order</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!$menus->count())
			<tr><td colspan="6" align="center"><i>Empty</i></td></tr>
			@endif
			
			@foreach($menus as $key => $menu)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$menu->title}}</td>
				<td>{{$menu->url}}</td>
				<td>{{($menu->parent != 0)?$menu->parent_menu->title:'No Parent'}}</td>
				<td>{{$menu->display_order}}</td>
				<td class="tools">
					<a title="Edit Menu Title" href="{{url('menu/edit', array($menu->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete Menu" href="{{url('menu/delete', array($menu->id))}}?page={{Input::get('page')}}" class="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>

	{{$menus->links()}}
</div>
@stop
