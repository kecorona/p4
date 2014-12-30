<!DOCTYPE html>
<html>
<head>

	@include('partials.head')

</head>

<body>
<div style="background-image: url('packages/img/top_bg.png'); height:120px; background-repeat: repeat-x">
	@include('partials.header')
	</div>

		@if(Session::has('message'))
			<div class="flash alert">
				<p>{{ Session::get('message') }}</p>
			</div>
		@endif

		@yield('content')
	</div>

</body>
</html>