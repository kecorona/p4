<!DOCTYPE html>
<html>
<head>

	@include('partials.head')

</head>

<body>

	@include('partials.header')

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