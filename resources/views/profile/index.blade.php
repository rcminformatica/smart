@extends('layouts.admin')
@include('alerts.success')
@section('menu')
	@include('mnu.mnuProfile')
@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'profile.updateEmpresa', 'method'=>'POST'])!!}
	@include('profile.forms.profile')
	{!!Form::close()!!}
@endsection