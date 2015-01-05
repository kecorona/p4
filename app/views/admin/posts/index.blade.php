@extends('layouts.admin')

@section('content')

<div class="uk-width-medium-1-1">
{{ link_to_route('admin.posts.create', 'Create New Post', null, ['class' => 'uk-button uk-button-primary']) }}
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
		</table>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{{ $post->title }}</td>
		</tbody>