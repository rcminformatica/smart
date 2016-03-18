@extends('layouts.admin')
	@section('content')
	@include('alerts.request')

	{{ Form::model($user, array('route' => array('transportadora.ok', $user->id))) }}

		<!-- name -->
{{ Form::label('name', 'Name') }}
{{ Form::text('name') }}

		<!-- email -->
{{ Form::label('email', 'Email') }}
{{ Form::email('email') }}

{{ Form::submit('Update Nerd!') }}

{{ Form::close() }}
	@endsection