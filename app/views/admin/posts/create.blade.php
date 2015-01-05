@extends('layouts.master')

@section('content')


<div class="uk-containter uk-container-center">
@if(Auth::check())
	<div class="uk-grid">
		<div class="uk-width-medium-3-4">

			<form class="uk-form">
			{{ Form::open(['route' => 'createPost', 'method' => 'POST'])}}
				<fieldset data-uk-margin>
					<legend>New Post</legend>

					<div class="uk-form-row">
						{{ Form::text('title', 'Title', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'First Name']) }}
					</div>
					<div class="uk-form-row">
						{{ Form::text('slug', 'Slug', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'First Name']) }}
					</div>
					<div class="uk-form-row">
						{{ Form::textarea('content', 'Post Content', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Post content'])) }}
					</div>
					<div class="uk-form-row">
						{{ Form::submit('submit', ['class' => 'uk-button uk-button-primary']) }}
					</div>
				</fieldset>
			</form>
		</div>

		<div class="uk-width-medium-1-4">
		</div>
	</div>
@else
	@include('../users.login')
@endif
@stop