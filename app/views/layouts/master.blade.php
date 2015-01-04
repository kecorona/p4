<!DOCTYPE html>
<html>
<head>

	@include('partials.head')

</head>

<body>
<div class="uk-container" style="background-image: url('packages/img/top_bg.png'); height:120px; background-repeat: repeat-x">
	@include('partials.nav')
</div>

		@if(Session::get('message'))
			<div class="uk-alert">
				<p>{{ Session::get('message') }}</p>
			</div>
		@endif
		<div class="uk-container">
			@yield('content')
		</div>
		<div class="uk-container">
			@include('partials.footer')
		</div>
</div>

</body>
</html>