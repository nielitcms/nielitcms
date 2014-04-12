@extends('layout.backend')

@section('content')

@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-edit"></i> Edit Album</h3>
	<hr>
	<div class="col-sm-6">
		<div class="row">

			{{Form::open(array('url'=>'admin/album/edit/' . $album->id, 'method'=>'post'))}}
				<div class="form-group">
					{{Form::text('title', Input::old('title',$album->title), array('class'=>'input-sm form-control tooltip-right', 
					'placeholder'=>'Enter Album Title', 'title'=>'Album Title'))}}

					@if($errors->has('title'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('title')}}</p>
					</span>
					@endif
				</div>
				<div class="form-group">
					{{Form::text('description', Input::old('description',$album->description), array('class'=>'input-sm form-control tooltip-right', 
					'placeholder'=>'Enter Album Description', 'title'=>'Album Description'))}}
					
					@if($errors->has('description'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('description')}}</p>
					</span>
					@endif
				</div>									
				<div class="form-group">
					<button type="submit" class="btn btn-sm btn-primary">Save</button>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop