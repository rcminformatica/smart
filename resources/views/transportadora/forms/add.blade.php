<!-- CADASTRO DE TRANSPORTADORA -->
<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Cadastro</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">

                <div class="container popup">
                    <div class="wrapper">
                        <input class="txt100" id="cd_interno" type="text" placeholder="Código Interno" required
                               autocomplete="false" />
                        <label for="cd_interno">Código Interno</label>
                    </div>

                    <div class="wrapper">
                        <input class="txt120" id="cnpj" type="text" placeholder="CNPJ" required
                               autocomplete="false" />
                        <label for="cnpj">CNPJ</label>
                    </div>


                    <div class="wrapper">
                        <input  class="txt350" id="ds_razao_social" type="text" placeholder="Razão Social" required
                               autocomplete="false" />
                        <label for="ds_razao_social">Razão Social</label>
                    </div>
                    <div class="wrapper">
                        <input  class="txt250" id="ds_nome_fantasia" type="text" placeholder="Nome Fantasia" required
                                autocomplete="false" />
                        <label for="ds_nome_fantasia">Nome Fantasia</label>
                    </div>
                </div>

            </table>

        </div>

     <div class="panel-footer">

         {!!Form::submit('Cadastrar',['class'=>'btn btn-primary'])!!}
     </div>
    </div>
