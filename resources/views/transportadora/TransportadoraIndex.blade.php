@extends('layouts.admin')
@include('alerts.success')
@section('menu')
	@include('mnu.mnuAdmin')
@section('content')
	{!!Html::script('js/cep.js')!!}

	@include('alerts.request')
	{!!Form::open(['route'=>'painel.transportadora.create', 'method'=>'POST'])!!}
	@include('transportadora.forms.frmTransportadoraIndex')
	{!!Form::close()!!}
@endsection