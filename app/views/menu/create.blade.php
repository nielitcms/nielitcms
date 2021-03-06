@extends('layout.backend')

@section('content')
<div class="col-sm-12">
	@if($menulocation == 'top')
	<h3><i class="glyphicon glyphicon-plus"></i> Top Menu &raquo; Add Menu</h3>
	@elseif($menulocation == 'bottom')
	<h3><i class="glyphicon glyphicon-plus"></i> Bottom Menu &raquo; Add Menu</h3>
	@elseif($menulocation == 'sidebar')
	<h3><i class="glyphicon glyphicon-plus"></i> Sidebar Quick link &raquo; Add</h3>
	@endif

	<hr>

	{{Form::open(array('url'=>'admin/menu/create/' . $menulocation, 'method'=>'post', 'class'=>'form-vertical', 'enctype'=>'multipart/form-data'))}}
		<div class="form-group">
			{{Form::label('title', 'Menu Title', array('class'=>'control-label'))}}
			{{Form::text('title', Input::old('title'), array('class'=>'form-control input-sm tooltip-left', 
			'placeholder'=>'Menu Title', 'title'=>'Menu Title'))}}
			
			@if($errors->has('title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('url', 'Menu Url', array('class'=>'control-label'))}}
			{{Form::text('url', Input::old('url'), array('class'=>'form-control input-sm tooltip-left', 
			'placeholder'=>'Menu Url', 'title'=>'Menu Url'))}}
			
			@if($errors->has('url'))
			<p class="help-block"><span class="text-danger">{{$errors->first('url')}}</span></p>
			@endif
		</div>
		
		@if($menulocation != 'bottom')
		<div class="form-group">
			{{Form::label('parent', 'Parent', array('class'=>'control-label'))}}
			{{Form::select('parent', $parent,  Input::old('parent'), array('class'=>'tooltip-left input-sm form-control', 'title'=>'Select Parent'))}}
			
			@if($errors->has('parent'))
			<p class="help-block"><span class="text-danger">{{$errors->first('parent')}}</span></p>
			@endif
		</div>
		@endif

		<div class="form-group">
			{{Form::label('display_order', 'Display Order', array('class'=>'control-label'))}}
			{{Form::text('display_order', Input::old('display_order'), array('class'=>'form-control input-sm tooltip-left', 
			'placeholder'=>'Display Order', 'title'=>'Display Order'))}}
			
			@if($errors->has('display_order'))
			<p class="help-block"><span class="text-danger">{{$errors->first('display_order')}}</span></p>
			@endif
			<p class="help-block">Enter number here to be used for sorting the menu. Ex: Menu with display order 1 will be displayed first.</p>
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
		</div>
	{{Form::close()}}
</div>

@stop