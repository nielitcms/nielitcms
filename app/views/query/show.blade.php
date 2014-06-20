@extends('layout.frontend')

@section('content')

<div >

		<h4><u>Query:</u> <br>{{$query->query}}</h4><br>
		<hr>Response:<br>{{$query->response}}</h2><br>

</div>
@stop
