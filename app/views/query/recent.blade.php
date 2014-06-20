@extends('layout.frontend')

@section('content')

<div class="posts">
	
	<h2>Recent Queries</h2>
		@if(!count($queries))
			No Queries
		@endif

		@if(count($queries))
		 	@foreach($queries as $query)
				<div class="form-group">
					<a href="{{url('query/' . $query->id)}}" >{{$query->query}}<br></a>
				</div>
				
			@endforeach
		@endif
</div>
@stop
