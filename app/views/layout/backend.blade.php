@include('layout.backend-partial.header')
<tr>
	<td align="center">
		@include('layout.backend-partial.leftsidebar')
	</td>
	<td align="center" width="85%">
		@yield('content')
	</td>
</tr>

@include('layout.backend-partial.footer')
