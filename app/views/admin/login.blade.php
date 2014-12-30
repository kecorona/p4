@extends('layouts.master')

@section('content')
<div class="uk-vertical-align uk-text-center uk-height-1-1">
    <div class="uk-vertical-align-middle" style="width: 250px;">
    	<img class="uk-margin-bottom" width="140" height="120" src="wla_logo" />

    	<form class="uk-panel uk-panel-box uk-form">
                    
	{{ Form::open(['route' => 'login', 'method' => 'POST'])}}

		<div class="uk-form-row">
			{{ Form::label('username', 'Username', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'username') }}
			{{ Form::text('username') }}
		</div>

		<div class="uk-form-row">
			{{ Form::label('password', 'Password'),  ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'password'] }}
			{{ Form::password('password') }}
		</div>
		
		<div class="uk-form-row">
			{{ Form::submit('login'), ['class' => 'uk-width-1-1 uk-button uk-button-primary uk-button-large'] }}
		</div>


	{{ Form::close() }}
	</form>
	</div>
	</div>
@stop