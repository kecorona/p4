@extends('layouts.master')

@section('content')
	<div class="uk-header">
		<h1>WLA <small>Customer Relationship Manager</small></h1>
	</div>

	<div class="uk-grid">
		<div class="uk-width-medium-1-2">
			<div class="uk-panel uk-panel-box uk-panel-secondary">
				<h3 class="uk-panel-title">Panel 1</h3>
				<a href="{{ action('UserController@create') }}" class="btn btn-info">Add New user</a>
			
				<table class="uk-table">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						`
						<td>
							<a href="#" class="btn btn-info">Edit</a>
							<a href="#" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="uk-width-medium-1-2">
		<div class="uk-panel uk-panel-box uk-panel-secondary">
			<h3 class="uk-panel-title">Panel 1</h3>
			<p>Lorem ipsum</p>
		</div>
	</div>
</div>

@stop