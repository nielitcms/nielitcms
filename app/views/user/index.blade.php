@extends('layout.frontend')

@section('content')
<h3>User</h3>

<form action="/postuser" method="post">
	<input type="text" name="username" value="" />
	<input type="submit" name="submit" value="Go" />
</form>
@stop