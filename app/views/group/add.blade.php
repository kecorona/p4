@extends('layouts.master')

@section('content')

	{{ Form::open([
		'route'	=>	'group.add',
		'autocomplete'	=>	'off'
	]) }}

	{{ Form::field([
		'route'			=>	'name',
		'label'			=>	'Name',
		'form'			=>	$form,
		'placeholder'	=>	'new group'
	]) }}

	{{ Form::submit('save') }}

	{{ Form::close() }}

@stop