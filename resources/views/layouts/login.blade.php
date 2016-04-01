<!DOCTYPE html>
<html>
<head>
	<title>SMART |  Cotação de Fretes | ADMIN </title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- SWEET ALERT -->
	<link rel="stylesheet" href="css/sweetalert.min.css">
	<!--FORMULÁRIO CADASTROS -->
	<link href="css/cadastro.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="js/flutuar_logo.php" type="text/javascript"></script>
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Cotação de Fretes, TMS Embarcador" />

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--webfont-->
	<script src="js/sweetalert.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<!-- header-section-starts -->

<!-- fim header -->
<div class="full">

	@include('layouts.menulateral')
	@include('layouts.toplogin')
	@include('alerts.flash')
	@include('alerts.errors')
	<div class="main">

		@yield('content')



		<div class="footer">
			<h6><a href="http://suporte.fretecotacao.com.br">Suporte :</a> </h6>
			<p class="claim">Para atendimento e suporte você deverá abrir um <a href="http://suporte.fretecotacao.com.br">chamado  </a></p>
			<div class="copyright">
				<p> RCM Informática ® 2016 | Consultoria em Sistemas Corporativos</p>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>