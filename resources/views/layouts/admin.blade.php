<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>SMART | Frete Cotação </title>



    {!!Html::style('css/bootstrap.css')!!}


    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/smart.css')!!}

            <!-- SWEET ALERT -->

    <link rel="stylesheet" href="css/sweetalert.min.css">
    <script src="js/sweetalert.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

<div id="wrapper">


    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/painel">FRETE COTAÇÃO</a>
        </div>


        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>

                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{!! route('profile.index')!!}"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        @yield('menu')


    </nav>

    <div id="page-wrapper">
        @yield('content')
    </div>

</div>

{!!Html::script('js/mascara.js')!!}
{!!Html::script('js/jquery.min.js')!!}



{!!Html::script('js/bootstrap.js')!!}
{!!Html::script('js/bootstrap-confirmation.js')!!}
        <!-- popup de confirmacao -->
{!!Html::script('js/confirmation.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}

{!!Html::script('js/sweetalert.js')!!}



</body>

</html>
