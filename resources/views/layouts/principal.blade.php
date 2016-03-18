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
			<h6>Disclaimer : </h6>
			<p class="claim">This is a freebies and not an official website, I have no intention of disclose any movie, brand, news.My goal here is to train or excercise my skill and share this freebies.</p>
			<a href="example@mail.com">example@mail.com</a>
			<div class="copyright">
				<p> Template by  <a href="http://w3layouts.com">  W3layouts</a></p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(window).load(function() {

		$("#flexiselDemo1").flexisel({
			visibleItems: 6,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,
			pauseOnHover: false,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: {
				portrait: {
					changePoint:480,
					visibleItems: 2
				},
				landscape: {
					changePoint:640,
					visibleItems: 3
				},
				tablet: {
					changePoint:768,
					visibleItems: 4
				}
			}
		});
	});
</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>

<div class="clearfix"></div>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>