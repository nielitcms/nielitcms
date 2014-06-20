@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3>
	<?php $menu=$menus->first(); ?>
		@if($menus->count())
			<i class="glyphicon glyphicon-th-list", class="col-sm-9"></i>{{$menu->parent_menu->title}} child
		@else
			<i class="glyphicon glyphicon-th-list", class="col-sm-9"></i>  child
		@endif
		
	</h3>
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

					<a title="Edit Menu Title" href="{{url('admin/menu/edit', array($menu->id))}}" class="btn btn-warning btn-xs">
						<i class="glyphicon glyphicon-edit"></i>
					</a>
					
					<a onclick="return confirm('Are you sure?');" title="Delete Menu" href="{{url('admin/menu/delete', array($menu->id))}}?page={{Input::get('page')}}" class="btn btn-danger btn-xs">
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
