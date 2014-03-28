@extends('layout.backend')

@section('content')

<div class="col-sm-12">
	<h3><i class="glyphicon glyphicon-plus"></i> Create New Category</h3>
	<hr>

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>	
	@endif

	<div class="col-sm-6">
		<div class="row">
			{{Form::open(array('url'=>'/category/create', 'method'=>'post'))}}
				<div class="form-group">
					{{Form::text('name', Input::old('name'), array('class'=>'input-sm form-control tooltip-right', 'placeholder'=>'Enter Category Name', 'title'=>'Category name'))}}

					@if($errors->has('name'))
					<span class="help-block">
						<p class="text-danger">{{$errors->first('name')}}</p>
					</span>
					@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-sm btn-primary">Submit</button>		
				</div>
			{{Form::close()}}
		</div>
	</div>

</div>
@stop
