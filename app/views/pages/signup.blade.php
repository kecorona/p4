@extends('layouts.master')

@section('content')
<div class="uk-vertical-align uk-text-center uk-height-1-1">
    <div class="uk-vertical-align-middle" style="width: 250px;">
    	<img class="uk-margin-bottom" width="140" height="120" src="wla_logo" />

    	<form class="uk-panel uk-panel-box uk-form">
			<div class="uk-form-row">
				<h1 class="kc-form-title uk-text-contrast">Sign Up</h1>
			</div>
			{{ Form::open(['url' => 'pages.logout')) }}
			<div class="uk-form-row">
			{{ Form::text('first_name', Input::get('first_name'), ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'First Name']) }}
			</div>
		    <div class="uk-form-row">
		        {{ Form::text('last_name', Input::get('last_name'), ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Last Name']) }}
			</div>
			<div class="uk-form-row">
		        {{ Form::email('email', Input::get('email'), ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Email']) }}
			</div>
			<div class="uk-form-row">
			{{ Form::password('password', '',  ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Password']) }}
			</div>
			<div class="uk-form-row">
		    {{ Form::password('password_confirm', '', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Confirm Password']) }}
			</div>
		    <div class="uk-form-row">
			    {{ Form::submit('Register', ['class' => 'uk-button uk-vertical-align']) }}
			    <p>Your information will not be shared with any third parties</p>
			</div>
			{{ Form::close() }}
		</form>
	</div>
</div>

@stop