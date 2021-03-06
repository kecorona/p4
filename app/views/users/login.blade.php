@extends('layouts.master')

@section('content')
<div class="uk-vertical-align uk-text-center uk-height-1-1">
    <div class="uk-vertical-align-middle">

    	<form class="uk-form uk-form-horizontal">
                    
		{{ Form::open(array('url' => 'users.login')) }}
		@if($errors->any())
			<div class="uk-alert uk-alert-danger">
				<a href="#" class="uk-close" uk-data-dismiss="uk-alert">&times;</a>
				{{ implode('', $errors->all('<li class="uk-error">:message</li>')) }}
			</div>
		@endif
			<fieldset data-uk-margin>
				<legend>Login</legend>
				<div class="uk-form-row">

					{{ Form::email('email', '', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Email']) }}
				</div>

				<div class="uk-form-row">

					{{ Form::password('password',  ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Password']) }}

				</div>
				<hr>
				<div class="uk-form-row">
					{{ Form::submit('login', ['class' => 'uk-width-1-1 uk-button uk-button-primary uk-button-large']) }}
					{{ HTML::link('/', 'Nevermind', ['class' => 'uk-width-1-1 uk-button uk-button-danger uk-button-large']) }}
				</div>
			</fieldset>
		{{ Form::close() }}
		</form>
	</div>
</div>
@stop