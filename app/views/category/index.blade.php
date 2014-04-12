@extends('layout.backend')

@section('content')
<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-7">
			
			<h3><i class="glyphicon glyphicon-th-list"></i> Category List</h3>
			<hr>
			@if(Session::has('message'))
			<div class="alert alert-success">{{Session::get('message')}}</div>	
			@endif
			
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>				
						<th class="col-sm-2"></th>
					</tr>
				</thead>
				<tbody>
					@if(!$categories->count())
					<tr><td colspan="3" align="center"><i>Empty</i></td></tr>
					@endif
					
					@foreach ($categories as $key => $category)
					<tr>
						<td>{{$key+$index}}</td>
						<td>{{$category->name}}</td>
						<td class="tools">
							<a title="Edit Category" href="{{url('admin/category/edit', array($category->id))}}" class="btn btn-warning btn-xs">
								<i class="glyphicon glyphicon-edit"></i>
							</a>
							
							<a onclick="return confirm('Are you sure?');" title="Delete Category" href="{{url('admin/category/delete', array($category->id))}}?page={{Input::get('page')}}" class="btn btn-danger btn-xs">
								<i class="glyphicon glyphicon-trash"></i>
							</a>		
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			{{$categories->links()}}
		</div>
		<div class="col-sm-4 col-sm-offset-1">
			<div class="row">
				<h3><i class="glyphicon glyphicon-plus"></i> Add Category</h3>
				<hr>
				{{Form::open(array('url'=>'admin/category/create', 'method'=>'post'))}}
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
</div>

@stop
