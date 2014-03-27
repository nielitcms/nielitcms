@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h2><i class="glyphicon glyphicon-plus"></i> Add New Page</h2>
	<hr>

	<form class="form-horizontal" action="/page/create" method="post">
		<div class="form-group">
			<label for="title" class="col-sm-3 control-label">Title</label>
			<div class="col-sm-9">
				<input id="title" type="text" name="title" class="form-control" value="" />
				@if($errors->has('title'))
				<p class="help-block"><span class="text-danger">{{$errors->first('title')}}</span></p>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label for="content" class="col-sm-3 control-label">Content</label>
			<div class="col-sm-9">
				<textarea name="content" id="content" class="form-control" rows="8"></textarea>
				@if($errors->has('content'))
				<p class="help-block"><span class="text-danger">{{$errors->first('content')}}</span></p>
				@endif
				<script type="text/javascript">CKEDITOR.replace( 'content' );</script>
			</div>
		</div>

		<div class="form-group">
			<label for="category" class="col-sm-3 control-label">Category</label>
			<div class="col-sm-9">
				<select name="category[]" class="form-control" multiple="multiple">
					@foreach($pages as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				<p class="help-block">Press CTRL to select multiple categories</p>
				@if($errors->has('category'))
				<p class="help-block"><span class="text-danger">{{$errors->first('category')}}</span></p>
				@endif
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" name="add" class="btn btn-primary">Create</button>
			</div>
		</div>
	</form>
</div>

@stop