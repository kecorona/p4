@extends('layouts.master')

@section('content')
<div class="uk-vertical-align uk-text-center uk-height-1-1">
    <div class="uk-vertical-align-middle" style="width: 250px;">
    	<img class="uk-margin-bottom" width="140" height="120" src="wla_logo" />

    	<form class="uk-panel uk-panel-box uk-form">
                    
		{{ Form::open(['route' => 'login', 'method' => 'POST']) }}
		{{ Form::hidden('_token', 'csrf_token()')}}
			
			<div class="uk-form-row">

				{{ $errors->first('email', 'error') }}
				{{ Form::label('email', 'Email', ['class' => 'uk-width-1-1 uk-form-large']) }}
				{{ Form::email('email') }}
				{{ $errors->first('email', '<span>:message</span') }}
			</div>

			<div class="uk-form-row">
				{{ $errors->first('password', 'error') }}
				{{ Form::label('password', 'Password',  ['class' => 'uk-width-1-1 uk-form-large']) }}
				{{ Form::password('password') }}
				{{ $errors->first('password', '<span>:message</span') }}
			</div>

			<div class="uk-form-row">
				{{ Form::checkbox('remember-me', 1) }}
			</div>

			<hr>
			
			<div class="uk-form-row">
				{{ Form::submit('login', ['class' => 'uk-width-1-1 uk-button uk-button-primary uk-button-large']) }}
			</div>


		{{ Form::close() }}
		</form>
	</div>
</div>
@stop