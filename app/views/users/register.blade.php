@extends('layouts.master')

@section('content')

<h1>Register</h1>
<form class="uk-form" uk-data-margin>
{{ Form::open(array('url' => 'register')) }}
	@if($errors->any())
		<div class="uk-alert uk-alert-danger">
			<a href="#" class="uk-close" uk-data-dismiss="uk-alert">&times;</a>
			{{ implode('', $errors->all('<li class="uk-error">:message</li>')) }}
		</div>
	@endif
	<div class="uk-form-group">
		<li>
			{{ Form::label('first_name', 'First Name:') }}
			{{ Form::text('first_name') }}
		</li>
		<li>
			{{ Form::label('last_name', 'Last Name:') }}
			{{ Form::text('last_name') }}
		</li>

		<li>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</li>
		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::email('email') }}
		</li>
	</div>
	<div class="uk-form-row">
		<li>
			{{ Form::submit('Submit', array('class' => 'button')) }}
		</li>
	</div>

{{ Form::close() }}
</form>

@stop