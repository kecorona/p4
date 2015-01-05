@extends('layouts.master')

@section('content')

<div class="uk-width-medium-1-1">
{{ link_to_route('posts.create', 'Create New Post', null, ['class' => 'uk-button uk-button-primary']) }}
</div>
@if($posts->count())
<h2>Existing Posts</h2>
	<div class="uk-medium-width-1-1">
		<table class="uk-table uk-table-bordered uk-table-striped">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Created</th>
					<th>Preview</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
		
			<tbody>
				@foreach($posts as $post)
				<tr>
					<td>{{ $post->title }}</td>
					<td>{{ substr($post->content, 0, 100). '[...]' }}</td>
					<td>{{ $post->created_at }}</td>
					<td>{{ link_to_route('posts.show', 'Preview', [$post->id], ['class' => 'uk-button uk-button-info']) }}</td>
					<td>{{ link_to_route('posts.edit', 'Edit', [$post->id], ['class' => 'uk-button uk-button-warning']) }}</td>
					<td>
						{{ Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) }}
						{{ Form::submit('Delete', ['class' => 'uk-button uk-button-danger']) }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@else
	<div class="uk-alert uk-alert-info">
		<h3>No posts to display</h3>
	</div>
	@endif
@stop