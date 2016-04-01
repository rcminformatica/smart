<!-- PROFILE -->
@inject('cep', 'Smart\Cep\Cep')



<div class="col-md-12">
    <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1default" data-toggle="tab">Lista</a></li>
                <li><a href="#tab2default" data-toggle="tab">Cadastro</a></li>
                <li><a href="#tab3default" data-toggle="tab">Editar</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                        <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1default">Default 1

                </div>
                <div class="tab-pane fade" id="tab2default"
                    {!!Form::open(['route'=>'transportadora.create', 'method'=>'POST'])!!}
                    @include('transportadora.forms.frmCadastroTransportadoracreate')
                    {!!Form::close()!!}
                </div>
                <div class="tab-pane fade" id="tab3default">Default 3</div>
                <div class="tab-pane fade" id="tab4default">Default 4</div>
                <div class="tab-pane fade" id="tab5default">Default 5</div>
            </div>
        </div>
    </div>
</div>

