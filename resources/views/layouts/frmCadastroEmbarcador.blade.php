@extends('layouts.principal')
@section('content')
@include('alerts.request')
{!!Html::script('js/cep.js')!!}

<!--	  <div class="contact-content">
    <div class="top-header span_top">
        <div class="logo">
            <a href="index.html"><img src="images/logo.png" alt="" /></a>
            <p>Movie Theater</p>
        </div>
        <div class="search v-search">
            <form>
                <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
                <input type="submit" value="">
            </form>
        </div>
        <div class="clearfix"></div>
    </div> -->
<!---contact-->
<script type="text/javascript" src="{!! asset('js/mascara.js') !!}"></script>
<div class="centraliza">
<form name="form1" action="{!! url('/salvar') !!}" method="post">
    <legend>Efetue seu cadastro ..</legend>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="cabecalho">Dados da Empresa...</div> <!-- DADOS DA EMPRESA -->
    <fieldset class="grupo">
        <div class="campo">
            <label for="cnpj">CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj"  onkeypress="mascara(this, 'cnpj')" maxlength="18" style="width: 250px" value="" />
        </div>
    </fieldset>
    <fieldset class="grupo">
        <div class="campo">
            <input type="hidden" name="tp_cliente" maxlength="1" value="E">
            <label for="ds_razao_social">Razão Social:</label>
            <input type="text" id="ds_razao_social" name="ds_razao_social" maxlength="100" style="width: 513px"  value="" />
        </div>
        <div class="campo">
            <label for="ds_nome_fantasia">Nome Fantasia:</label>
            <input type="text" id="ds_nome_fantasia" name="ds_nome_fantasia" maxlength="50" style="width: 250px"  value="" />
        </div>
        <div class="campo">
            <label for="ie">I.E:</label>
            <input type="text" id="ie" name="ie" maxlength="14" style="width: 250px"  value="" />
        </div>
    </fieldset>

    <div class="cabecalho">Endereço...:</div> <!-- ENDEREÇO -->
    <fieldset class="grupo">

        <div class="campo">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" onkeypress="mascara(this, 'cep')" onblur="pesquisacep(this.value);"  maxlength="9" style="width: 80px"  value="" />
        </div>
        <div class="campo">
            <label for="ds_endereco">Endereço:</label>
            <input type="text" id="ds_endereco" name="ds_endereco" maxlength="100" style="width: 425px"  value="" />
        </div>
        <div class="campo">
            <label for="ds_endereco_numero">Número:</label>
            <input type="text" id="ds_endereco_numero" name="ds_endereco_numero" maxlength="10" style="width: 85px"  value="" />
        </div>
        <div class="campo">
            <label for="ds_endereco_complemento">Complemento:</label>
            <input type="text" id="ds_endereco_complemento" name="ds_endereco_complemento" maxlength="60" style="width: 150px"  value="" />
        </div>
        <div class="campo">
            <label for="ds_bairro">Bairro:</label>
            <input type="text" id="ds_bairro" name="ds_bairro" maxlength="60" style="width: 150px"  value="" />
        </div>
    </fieldset>
    <fieldset class="grupo">
        <div class="campo">
            <label for="ds_cidade">Cidade</label>
            <input type="text" id="ds_cidade" name="ds_cidade" maxlength="72" style="width: 20em" value="" />
            <input type="hidden" id="ibge" name="ibge" maxlength="72" style="width: 20em" value="" />
        </div>
        <div class="campo">
            <label for="sg_uf">UF</label>
            <select name="sg_uf" id="sg_uf" maxlength="2">
                <option value="estado">--</option>
                <option value="AC">AC </option>
                <option value="AL">AL </option>
                <option value="AM">AM </option>
                <option value="AP">AP </option>
                <option value="BA">BA </option>
                <option value="CE">CE </option>
                <option value="DF">DF </option>
                <option value="ES">ES </option>
                <option value="GO">GO </option>
                <option value="MA">MA </option>
                <option value="MT">MT </option>
                <option value="MS">MS </option>
                <option value="MG">MG </option>
                <option value="PA">PA </option>
                <option value="PB">PB </option>
                <option value="PR">PR </option>
                <option value="PE">PE </option>
                <option value="PI">PI </option>
                <option value="RJ">RJ </option>
                <option value="RN">RN </option>
                <option value="RO">RO </option>
                <option value="RS">RS </option>
                <option value="RR">RR </option>
                <option value="SC">SC </option>
                <option value="SE">SE </option>
                <option value="SP">SP </option>
                <option value="TO">TO </option>
            </select>
            </select>
        </div>
    </fieldset>
    <div class="cabecalho">Seus dados...</div> <!-- SEUS DADOS -->
    <fieldset class="grupo">
        <div class="campo">
            <label for="nm_usuario">Nome Completo:</label>
            <input type="text" id="nm_usuario" name="nm_usuario" maxlength="100"  style="width: 513px"  value="" />
        </div>
        <div class="campo">
            <label for="nu_telefone">Telefone:</label>
            <input type="text" id="nu_telefone" name="nu_telefone"  onkeypress="mascara(this, 'telefone')" maxlength="12" style="width:100px"  value="" />
        </div>
        <div class="campo">
            <label for="nu_celular">Celular:</label>
            <input type="text" id="nu_celular" name="nu_celular" onkeypress="mascara(this, 'celular')" maxlength="13" style="width:105px"  value="" />
        </div>
    </fieldset>
    <fieldset class="grupo"> <!-- E-MAIL  -->
        <div class="campo">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" maxlength="100"style="width:250px"  value="" />
        </div>
        <div class="campo">
            <label for="conf_email">Confirme seu E-mail:</label>
            <input type="text" id="conf_email" name="conf_email"  maxlength="100"style="width:250px"  value="" />
        </div>
    </fieldset>
    <fieldset class="grupo"> <!-- PASSWORD -->
        <div class="campo">
            <label for="cd_senha">Senha:</label>
            <input type="password" id="cd_senha" name="cd_senha" maxlength="20" style="width:150px"  value="" />
        </div>
    </fieldset>
    <fieldset class="grupo">
        <div class="campo">
            <label for="conf_cd_senha">Confirme sua senha:</label>
            <input type="password" id="conf_cd_senha" name="conf_cd_senha" maxlength="20" style="width:150px"  value="" />


        </div>

    </fieldset>
    <div class="cabecalho"> Selecione

        <div class="captcha">
            {!! app('captcha')->display(); !!}

           </div>
    </div>
    <div class="alinhabotao">
        <div>
            <button type="submit"  class="btn btn-primary" name="submit" >Cadastrar</button>
            <a href="{!! url('salvar')!!} "> <button type="button" class="btn btn-danger">Cancelar</button></a>
        </div>
    </div>
</form>
    <div class="clearfix"></div>
</div>

@endsection