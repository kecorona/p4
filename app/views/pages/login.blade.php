@extends('layouts.master')

@section('content')
<div class="uk-vertical-align uk-text-center uk-height-1-1">
    <div class="uk-vertical-align-middle" style="width: 500px;">
    	<img class="uk-margin-bottom" width="140" height="120" src="wla_logo" />

    	<form class="uk-form uk-form-horizontal">
                    
		{{ Form::open(['url' => 'pages.login']) }}

			<div class="uk-form-row">

				{{ Form::email('email', '', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Email']) }}
			</div>

			<div class="uk-form-row">

				{{ Form::password('password',  ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Password']) }}

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