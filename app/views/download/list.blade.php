@extends('layout.frontend')

@section('content')
<div class="posts">
	<h2>Downloads</h2>

	
	@if(!$downloads->count())
	<p class="">There are no items</p>
	@else
	<ul class="download-list">
		@foreach($downloads as $key => $download)
		<li>{{$key+$index}}. <a href="{{url('admin/download/' . $download->id)}}" target="_blank" title="Click to download" class="tooltip-right">{{$download->title}}</a></li>
		@endforeach
	</ul>
	@endif

	{{$downloads->links()}}
</div>
@stop
