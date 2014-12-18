@extends('layouts.master')

@section('main')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
	<ul>
		<li>
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username') }}
		</li>
		<li>
			{{ Form::label('password', 'Password:') }}
			{{ Form::text('password') }}
		</li>
		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
		</li>
		<li>
			{{ Form::label('first_name', 'First Name:') }}
			{{ Form::text('first_name') }}
		</li>
		<li>
			{{ Form::label('last_name', 'Last Name:') }}
			{{ Form::text('last_name') }}
		</li>
		<li>
			{{ Form::submit('Update', array('class' => 'button button-info')) }}
			{{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'button')) }}
		</li>
	</ul>
{{ Form::close() }}

@if($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop