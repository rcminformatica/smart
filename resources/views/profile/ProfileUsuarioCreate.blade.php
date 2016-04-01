@extends('layouts.admin')
@include('alerts.success')
@section('menu')
	@include('mnu.mnuProfile')
@section('content')
	{!!Html::script('js/cep.js')!!}
	@include('alerts.request')

	{!!Form::open(['route'=>'profile.UsuarioStore', 'method'=>'POST'])!!}
	@include('profile.forms.frmProfileUsuarioCreate')
	{!!Form::close()!!}
@endsection