<!DOCTYPE html>
<html>
<head>

	@include('head')

</head>

<body>

	@include('header')

	<div class="uk-container">
		@if(Session::has('message'))
			<div class="flash alert">
				<p>{{ Session::get('message') }}</p>
			</div>
		@endif

		@yield('content')

	</div>

</body>
</html>