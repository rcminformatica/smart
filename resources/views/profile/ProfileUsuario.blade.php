@extends('layouts.admin')
@include('alerts.success')
@include('alerts.request')

@section('menu')
	@include('mnu.mnuProfile')
@section('content')
	{!!Html::script('js/cep.js')!!}


	{!!Form::open(['route'=>'profile.EmpresaUpdate', 'method'=>'POST'])!!}
	@include('profile.forms.frmProfileUsuarioIndex')
	{!!Form::close()!!}


@endsection