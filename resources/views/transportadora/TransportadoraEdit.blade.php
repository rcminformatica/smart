@extends('layouts.admin')
@include('alerts.success')
@section('menu')
    @include('mnu.mnuProfile')
@section('content')
    {!!Html::script('js/cep.js')!!}

    @include('alerts.request')
    {!!Form::open(['route'=>'painel.transportadora.update', 'method'=>'POST'])!!}
    @include('transportadora.forms.frmCadastroTransportadoraEdit')
    {!!Form::close()!!}
@endsection