@extends('layouts.admin')
@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'transportadora.store', 'method'=>'POST'])!!}
	@include('transportadora.forms.add')


	{!!Form::close()!!}
@endsection