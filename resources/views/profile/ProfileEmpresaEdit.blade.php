@extends('layouts.admin')
@include('alerts.success')
@section('menu')
	@include('mnu.mnuProfile')
@section('content')
	{!!Html::script('js/cep.js')!!}

	@include('alerts.request')
	{!!Form::open(['route'=>'profile.EmpresaUpdate', 'method'=>'POST'])!!}
	@include('profile.forms.frmProfileEmpresaEdit')
	{!!Form::close()!!}
@endsection