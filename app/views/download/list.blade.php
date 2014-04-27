@extends('layout.frontend')

@section('content')
<div class="posts">
	<h2>Downloads</h2>

	<table class="table table-condensed table-hover">
	<tbody>
	@if(!$downloads->count())
	<tr><td colspan="2" align="center"><p class="">There are no items</p></td></tr>
	@else
	
		@foreach($downloads as $key => $download)
		<tr>
			<td>{{$key+$index}}. {{$download->title}}</a></td>
			<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download">
				<i class="glyphicon glyphicon-download-alt"> Download</i></a></td>
		</tr>		
		@endforeach
	
	@endif
	</table>
	{{$downloads->links()}}
</div>
@stop
