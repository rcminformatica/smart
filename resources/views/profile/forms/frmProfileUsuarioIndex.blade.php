
@extends('layouts.admin')
@include('alerts.success')
@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="TituloForm"><i class="fa fa-user"></i> Lista de Usuários </div>

		</div>


	{!!Form::open(['route'=>'profile.UsuarioSearch', 'method'=>'POST','class'=>'navbar-form navbar-right'])!!}
		<div class="input-group input-group-sm">
		{!!Form::text('filter',null,['class'=>'form-control','placeholder'=>'Nome...'])!!}
	</div>
	{!!Form::submit('Filtrar',['class'=>'btn btn-default '])!!}
	{!!Form::close()!!}


	<div class="users">
		<table class="table table-hover">
			<thead>

			<th># </th>
			<th>Nome </th>
			<th>e-mail</th>
			<th>Opções</th>


			</thead>


			@foreach($usuarios as $r1)
				<tbody>

				<td>{{$r1->id}}</td>
				<td>{{$r1->nm_usuario}}</td>
				<td>{{$r1->email}}</td>
				<td>


				 	<div id="actions" class="row">

					{!!link_to_route('profile.UsuarioEdit', $title = 'Editar', $parameters = ['id'=>$r1->id], $attributes = ['class'=>'btn btn-info btn-xs'])!!}
						{!!link_to_route('profile.UsuarioDestroy', $title = 'Excluir', $parameters = ['id'=>$r1->id],
						$attributes = ['class'            =>'btn btn-danger btn-xs',
									   'data-toggle'      => 'confirmation',
									   'data-title'       => 'Deseja realmente excluir este usuário?',
									   'data-placement'   => 'left',
									   'data-popout'   => 'true',
									   'data-btnOkLabel'  => 'Sim',
									   'data-btnCancelLabel' => 'Não',
									   'data-href' => route('profile.UsuarioDestroy',['id'=>$r1->id])
						])!!}


					</div>



			 </td>
				</tbody>

			@endforeach
			@if(empty($r1))
				<td> Nenhum registro encontrado!</td>

			@endif
		</table>
		{!!$usuarios->render()!!}




	</div>


	<div class="panel-footer">

		{!!link_to_route('profile.UsuarioCreate', $title = 'Adicionar', $parameters = [], $attributes = ['class'=>'btn btn-primary'])!!}


	</div>

@endsection

