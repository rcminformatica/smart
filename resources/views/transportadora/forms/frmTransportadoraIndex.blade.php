@extends('layouts.admin')
@include('alerts.success')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">

			<div class="TituloForm"><i class="fa fa-truck"></i> Lista de Transportadoras </div>

		</div>

	<div class="users">
		<table class="table table-hover">
			<thead>
			<th>#</th>
			<th>Razao Social</th>
			<th>Nome Fantasia</th>
			<th>CNPJ</th>
			<th></th>
			</thead>

			@foreach($transportadoras as $r1)
				<tbody>
				<td>{{$r1->id}}</td>
				<td>{{$r1->ds_razao_social}}</td>
				<td>{{$r1->ds_nome_fantasia}}</td>
				<td>{{Utils::mask($r1->cnpj, Mask::CNPJ)}}</td>
				<td>
					<div id="actions" class="row">

						{!!link_to_route('painel.transportadora.edit', $title = 'Editar', $parameters = ['id'=>$r1->id], $attributes = ['class'=>'btn btn-info btn-xs'])!!}
						{!!link_to_route('painel.transportadora.destroy', $title = 'Excluir', $parameters = ['id'=>$r1->id],
						$attributes = ['class'            =>'btn btn-danger btn-xs',
									   'data-toggle'      => 'confirmation',
									   'data-title'       => 'Deseja realmente excluir este usuário?',
									   'data-placement'   => 'left',
									   'data-popout'   => 'true',
									   'data-btnOkLabel'  => 'Sim',
									   'data-btnCancelLabel' => 'Não',
									   'data-href' => route('painel.transportadora.destroy',['id'=>$r1->id])
						])!!}


					</div>
				</td>
				</tbody>

			@endforeach
			@if(empty($r1))
				<td> Nenhum registro encontrado!</td>

			@endif
		</table>
		{!!$transportadoras->render()!!}



	</div>


	<div class="panel-footer">

		{!!link_to_route('painel.transportadora.create', $title = 'Adicionar', $parameters = null, $attributes = ['class'=>'btn btn-primary'])!!}

	</div>

@endsection
@section('scripts')
	{!!Html::script('js/script3.js')!!}
@endsection