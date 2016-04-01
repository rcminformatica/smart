@extends('layouts.admin')
@include('alerts.success')
@include('alerts.request')
@include('alerts.errors')
@section('menu')
	@include('mnu.mnuProfile')
@section('content')
	{!!Html::script('js/cep.js')!!}


	{!!Form::open(['route'=>'profile.UsuarioUpdate', 'method'=>'POST'])!!}
	@include('profile.forms.frmProfileUsuarioEdit')
	{!!Form::close()!!}
@endsection