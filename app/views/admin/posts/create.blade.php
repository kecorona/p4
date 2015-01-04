@extends('layouts.master')

@section('content')


<div class="uk-containter uk-container-center">
@if(Auth::check())
	<div class="uk-grid">
		<div class="uk-width-medium-3-4">
			<article class="uk-article">
				<h1 class="uk-article-title">Admin Dashboard,
					{{ Auth::user()->first_name }} ! - 
					<b>
						{{ link_to_route('logout', 'Logout') }}
					</b>
				</h1>

				<form class="uk-form">
				{{ Form::open(['route' => 'createPost', 'method' => 'POST'])}}
				
					<div class="uk-form-row">
					{{ Form::text('title', 'Title') }}</div>
					<div class="uk-form-row">
					{{ Form::textarea('content', 'Post Content') }}</div>
					<div class="uk-form-row">
					{{ Form::submit('submit')}}
					</div>
				</form>

			</article>
		</div>

		<div class="uk-width-medium-1-4">
		</div>
	</div>
@else
	@include('pages.login')
@endif
@stop