@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-edit"></i> Edit Category({{$category->name}})</h3>
	<hr>

	<div class="col-sm-6">
		<div class="row">
			{{Form::open(array('url'=>'/category/edit/' . $category->id, 'method'=>'post'))}}
				<div class="form-group">
					{{Form::text('name', Input::old('name', $category->name), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Category Name', 'title'=>'Category name'))}}

					@if($errors->has('name'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('name')}}</p>
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
