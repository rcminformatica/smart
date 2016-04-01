@extends('layouts.admin')
@include('alerts.success')
@include('alerts.request')
@section('menu')
	@include('mnu.mnuAdmin')
@section('content')
	{!!Html::script('js/cep.js')!!}


	{!!Form::open(['route'=>'painel.transportadora.store', 'method'=>'POST'])!!}
	@include('transportadora.forms.frmCadastroTransportadoraCreate')
	{!!Form::close()!!}
@endsection