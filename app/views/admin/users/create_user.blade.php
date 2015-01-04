@extends('layouts.master')

@section('content')

<h1>Create User</h1>

{{ Form::open(array('route' => 'users.store'))}}

	<ul>
		<li>
			{{ Form::label('first_name', 'First Name:') }}
			{{ Form::text('first_name') }}
		</li>
		<li>
			{{ Form::label('last_name', 'Last Name:') }}
			{{ Form::text('last_name') }}
		</li>
		<li>
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username') }}
		</li>
		<li>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</li>
		<li>
			{{ Form::label('password', 'Confirm Password:') }}
			{{ Form::password('password_confirm') }}
		</li>
		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::email('email') }}
		</li>

		<li>
			{{ Form::submit('Submit', array('class' => 'uk-button')) }}
		</li>

	</ul>
{{ Form::close() }}

@if($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop