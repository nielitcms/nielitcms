@extends('layout.frontend')

@section('content')
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>

<button type="button" class="btn btn-success">Primary</button>

<button type="button" class="mytooltip btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Tooltip on right">Tooltip on right</button>
<button type="button" class="mytooltip btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on right">Tooltip on right</button>
<button type="button" class="mytooltip btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on right">Tooltip on right</button>
<button type="button" class="mytooltip btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</button>
<?php 
// $contents = Content::all();
$contents = Content::where('title', 'LIKE', 'My%')->orderBy('id','asc')->get();
foreach($contents as $item)
{
?>
	<div>
		<h2>{{$item->id}} {{$item->title}}</h2>
		<h5>{{$item->author_id}}</h5>
		<p>{{$item->content}}</p>
	</div>
<?php
}
?>
<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
@stop