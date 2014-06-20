@extends('layout.frontend')

@section('content')
<h2>Downloads</h2>
<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  <li class="active"><a href="#mca" data-toggle="tab">MCA</a></li>
  <li class=""><a href="#bca" data-toggle="tab">BCA</a></li>
  <li class=""><a href="#dete" data-toggle="tab">DETE</a></li>
  <li class=""><a href="#dcse" data-toggle="tab">DCSE</a></li>
  <li class=""><a href="#olevel" data-toggle="tab">O Level</a></li>
  <li class=""><a href="#alevel" data-toggle="tab">A Level</a></li>
  <li class=""><a href="#other" data-toggle="tab">OTHERS</a></li>
 
</ul>
<div id="myTabContent" class="tab-content">

  <div class="tab-pane fade" id="mca">
  	<table class="table table-condensed table-hover">
	<tbody>
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Number Of Downloads</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $count=0; ?>
		@foreach($downloads as $key => $download)
			@if($download->category=='mca')
			<?php $count++; ?>
			<tr>
				<td>{{$count}}</td>
				<td>{{$download->title}}</td>
				<td>{{date('dS F, Y h:iA', strtotime($download->created_at))}}</td>
				<th>{{$download->no_of_download}}</th>
				<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download" >
				<i class="glyphicon glyphicon-download-alt" onClick="location.reload()"> Download</i></a></td>
			</tr>
			@endif
		</tbody>
		@endforeach
		@if($count==0)
			<tr><td colspan="2" align="center"><p class="">There are no items for download</p></td></tr>
		@endif
	</table>
	{{$downloads->links()}}
  </div>

  <div class="tab-pane fade active in" id="bca">
  	<table class="table table-condensed table-hover">
	<tbody>
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Number Of Downloads</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $count=0; ?>
		@foreach($downloads as $key => $download)
			@if($download->category=='bca')
			<?php $count++; ?>
			<tr>
				<td>{{$count}}</td>
				<td>{{$download->title}}</td>
				<td>{{date('dS F, Y h:iA', strtotime($download->created_at))}}</td>
				<th>{{$download->no_of_download}}</th>
				<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download" >
				<i class="glyphicon glyphicon-download-alt" onClick="location.reload()"> Download</i></a></td>
			</tr>
			@endif
		</tbody>
		@endforeach
		@if($count==0)
			<tr><td colspan="2" align="center"><p class="">There are no items for download</p></td></tr>
		@endif
	</table>
	{{$downloads->links()}}
  </div>

  <div class="tab-pane fade active in" id="dete">
    <table class="table table-condensed table-hover">
	<tbody>
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Number Of Downloads</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $count=0; ?>
		@foreach($downloads as $key => $download)
			@if($download->category=='dete')
			<?php $count++; ?>
			<tr>
				<td>{{$count}}</td>
				<td>{{$download->title}}</td>
				<td>{{date('dS F, Y h:iA', strtotime($download->created_at))}}</td>
				<th>{{$download->no_of_download}}</th>
				<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download" >
				<i class="glyphicon glyphicon-download-alt" onClick="location.reload()"> Download</i></a></td>
			</tr>
			@endif
		</tbody>
		@endforeach
		@if($count==0)
			<tr><td colspan="2" align="center"><p class="">There are no items for download</p></td></tr>
		@endif
	</table>
	{{$downloads->links()}}
  </div>

  <div class="tab-pane fade active in" id="dcse">
    <table class="table table-condensed table-hover">
	<tbody>
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Number Of Downloads</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $count=0; ?>
		@foreach($downloads as $key => $download)
			@if($download->category=='dcse')
			<?php $count++; ?>
			<tr>
				<td>{{$count}}</td>
				<td>{{$download->title}}</td>
				<td>{{date('dS F, Y h:iA', strtotime($download->created_at))}}</td>
				<th>{{$download->no_of_download}}</th>
				<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download" >
				<i class="glyphicon glyphicon-download-alt" onClick="location.reload()"> Download</i></a></td>
			</tr>
			@endif
		</tbody>
		@endforeach
		@if($count==0)
			<tr><td colspan="2" align="center"><p class="">There are no items for download</p></td></tr>
		@endif
	</table>
	{{$downloads->links()}}
  </div>

  <div class="tab-pane fade active in" id="olevel">
    <table class="table table-condensed table-hover">
	<tbody>
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Number Of Downloads</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $count=0; ?>
		@foreach($downloads as $key => $download)
			@if($download->category=='olevel')
			<?php $count++; ?>
			<tr>
				<td>{{$count}}</td>
				<td>{{$download->title}}</td>
				<td>{{date('dS F, Y h:iA', strtotime($download->created_at))}}</td>
				<th>{{$download->no_of_download}}</th>
				<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download" >
				<i class="glyphicon glyphicon-download-alt" onClick="location.reload()"> Download</i></a></td>
			</tr>
			@endif
		</tbody>
		@endforeach
		@if($count==0)
			<tr><td colspan="2" align="center"><p class="">There are no items for download</p></td></tr>
		@endif
	</table>
	{{$downloads->links()}}
  </div>

  <div class="tab-pane fade active in" id="alevel">
    <table class="table table-condensed table-hover">
	<tbody>
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Number Of Downloads</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $count=0; ?>
		@foreach($downloads as $key => $download)
			@if($download->category=='alevel')
			<?php $count++; ?>
			<tr>
				<td>{{$count}}</td>
				<td>{{$download->title}}</td>
				<td>{{date('dS F, Y h:iA', strtotime($download->created_at))}}</td>
				<th>{{$download->no_of_download}}</th>
				<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download" >
				<i class="glyphicon glyphicon-download-alt" onClick="location.reload()"> Download</i></a></td>
			</tr>
			@endif
		</tbody>
		@endforeach
		@if($count==0)
			<tr><td colspan="2" align="center"><p class="">There are no items for download</p></td></tr>
		@endif
	</table>
	{{$downloads->links()}}
  </div>

  <div class="tab-pane fade active in" id="other">
   <table class="table table-condensed table-hover">
	<tbody>
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Number Of Downloads</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $count=0; ?>
		@foreach($downloads as $key => $download)
			@if($download->category=='other')
			<?php $count++; ?>
			<tr>
				<td>{{$count}}</td>
				<td>{{$download->title}}</td>
				<td>{{date('dS F, Y h:iA', strtotime($download->created_at))}}</td>
				<th>{{$download->no_of_download}}</th>
				<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download" >
				<i class="glyphicon glyphicon-download-alt" onClick="location.reload()"> Download</i></a></td>
			</tr>
			@endif
		</tbody>
		@endforeach
		@if($count==0)
			<tr><td colspan="2" align="center"><p class="">There are no items for download</p></td></tr>
		@endif
	</table>
	{{$downloads->links()}}
  </div>
</div>
@stop
<!-- <div class="posts">
	<h2>Downloads</h2>

	mca bca dete
	
	<table class="table table-condensed table-hover">
	<tbody>
	@if(!$downloads->count())
	<tr><td colspan="2" align="center"><p class="">There are no items</p></td></tr>
	@else


		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Number Of Downloads</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($downloads as $key => $download)
			<tr>
				<td>{{$key+$index}}</td>
				<td>{{$download->title}}</td>
				<td>{{date('dS F, Y h:iA', strtotime($download->created_at))}}</td>
				<th>{{$download->no_of_download}}</th>
				<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download" >
				<i class="glyphicon glyphicon-download-alt" onClick="location.reload()"> Download</i></a></td>
			</tr>
		</tbody>
		@endforeach
	
	@endif
	</table>
	{{$downloads->links()}}
</div> -->


<!-- @extends('layout.frontend')

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
			<td>{{$download->created_at}}</td>
			<td class="tools"><a href="{{url('download/' . $download->id)}}" target="_blank" class="btn btn-xs btn-success" title="Click to download">
				<i class="glyphicon glyphicon-download-alt"> Download</i></a></td>
		</tr>		
		@endforeach
	
	@endif
	</table>
	{{$downloads->links()}}
</div>
@stop -->
