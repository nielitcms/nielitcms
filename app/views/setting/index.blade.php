@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-wrench"></i> Setting</h3>
	<hr>

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif


	<form class="form-vertical" action="/admin/settings" method="post" enctype="multipart/form-data">
		<div class="form-group">
			{{Form::label('site_title', Setting::getTitle('site_title'), array('class'=>'control-label'))}}
			{{Form::text('site_title', Input::old('site_title', Setting::getData('site_title')), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>Setting::getTitle('site_title'), 'title'=>Setting::getTitle('site_title')))}}
			
			@if($errors->has('site_title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('site_title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('admin_site_title', Setting::getTitle('admin_site_title'), array('class'=>'control-label'))}}
			{{Form::text('admin_site_title', Input::old('admin_site_title', Setting::getData('admin_site_title')), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>Setting::getTitle('admin_site_title'), 'title'=>Setting::getTitle('admin_site_title')))}}
			
			@if($errors->has('admin_site_title'))
			<p class="help-block"><span class="text-danger">{{$errors->first('admin_site_title')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('allowed_file_extension', Setting::getTitle('allowed_file_extension'), array('class'=>'control-label'))}}
			{{Form::text('allowed_file_extension', Input::old('allowed_file_extension', Setting::getData('allowed_file_extension')), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>Setting::getTitle('allowed_file_extension'), 'title'=>Setting::getTitle('allowed_file_extension')))}}
			<p class="help-block">Enter file extension separated by comma. Ex: jpg,bmp,pdf.</p>
			@if($errors->has('allowed_file_extension'))
			<p class="help-block"><span class="text-danger">{{$errors->first('allowed_file_extension')}}</span></p>
			@endif
		</div>


		<div class="form-group">
			{{Form::label('footer_copyright_text', Setting::getTitle('footer_copyright_text'), array('class'=>'control-label'))}}
			{{Form::text('footer_copyright_text', Input::old('footer_copyright_text', Setting::getData('footer_copyright_text')), array('class'=>'form-control input-sm tooltip-left', 'placeholder'=>Setting::getTitle('footer_copyright_text'), 'title'=>Setting::getTitle('footer_copyright_text')))}}
			<p class="help-block">Enter file extension separated by comma. Ex: jpg,bmp,pdf.</p>
			@if($errors->has('footer_copyright_text'))
			<p class="help-block"><span class="text-danger">{{$errors->first('footer_copyright_text')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('no_of_item_perpage', Setting::getTitle('no_of_item_perpage'), array('class'=>'control-label'))}}
			{{Form::select('no_of_item_perpage', array('1'=>'1','5'=>'5','10'=>'10','15'=>'15','20'=>'20','25'=>'25','30'=>'30','35'=>'35','40'=>'40','45'=>'45', '50'=>'50'),  Input::old('no_of_item_perpage',Setting::getData('no_of_item_perpage') ), array('class'=>'tooltip-left input-sm form-control', 'title'=>'Select No Of Items Per Page'))}}
			
			@if($errors->has('no_of_item_perpage'))
			<p class="help-block"><span class="text-danger">{{$errors->first('no_of_item_perpage')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			{{Form::label('no_of_post', Setting::getTitle('no_of_post'), array('class'=>'control-label'))}}
			{{Form::select('no_of_post', array('1'=>'1','5'=>'5','10'=>'10','15'=>'15','20'=>'20','25'=>'25','30'=>'30','35'=>'35','40'=>'40','45'=>'45', '50'=>'50'),  Input::old('no_of_post',Setting::getData('no_of_post') ), array('class'=>'tooltip-left input-sm form-control', 'title'=>'Select No Of Post to be Display'))}}
			
			@if($errors->has('no_of_post'))
			<p class="help-block"><span class="text-danger">{{$errors->first('no_of_post')}}</span></p>
			@endif
		</div>


		<div class="form-group">
			{{Form::label('banner_image', Setting::getTitle('banner_image'), array('class'=>'control-label'))}}
			{{Form::select('banner_image', $albums, Input::old('banner_image', Setting::getData('banner_image')), array('class'=>'tooltip-left input-sm form-control', 'title'=>'Select album to be used as banner slider'))}}
			
			@if($errors->has('banner_image'))
			<p class="help-block"><span class="text-danger">{{$errors->first('banner_image')}}</span></p>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
		</div>
	</form>
</div>

@stop