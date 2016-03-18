@extends('layouts.principal')
@section('content')

	<div class="header">
		<div class="top-header">

			<div class="clearfix"></div>
		</div>
		<div class="header-info">
			<h1>ECONOMIZE!</h1>
			<h2>Faça uma Cotação de Frete agora!</h2>
			<!-- <p class="age"><a href="#">All Age</a> Don Hall, Chris Williams</p> -->

			<p class="special">Centenas de empresas estão economizando com a nossa solução de contratação de fretes, não deixe sua empresa de fora!</p>
			<a class="cadastro" href="{!! url('/cadastro') !!}"><i class="cadastro1"><label> Embarcador</label></i>CADASTRE-SE</a>
			<a class="cadastro" href="{!!url('/cadastro') !!}"><i class="cadastro1"><label> Transportador</label></i>CADASTRE-SE</a>
		</div>
	</div>
	<div class="review-slider">
		<ul id="flexiselDemo1">
			<li><img src="images/r1.jpg" alt=""/></li>
			<li><img src="images/r2.jpg" alt=""/></li>
			<li><img src="images/r3.jpg" alt=""/></li>
			<li><img src="images/r4.jpg" alt=""/></li>
			<li><img src="images/r5.jpg" alt=""/></li>
			<li><img src="images/r6.jpg" alt=""/></li>
		</ul>

	</div>
@endsection