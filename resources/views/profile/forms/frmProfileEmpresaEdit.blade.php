<!-- PROFILE -->
@inject('cep', 'Smart\Cep\Cep')


<div class="panel panel-default">
	<div class="panel-heading">
		<div class="TituloForm"><i class="fa fa-building"></i> Empresa </div>

</div>
	<div class="panel-body">

		<table class="table table-bordered">
            <input name="id" value="{{$r1->id}}" class="txt100"   id="id" type="hidden" placeholder=""
                   autocomplete="false" />

			<div class="container popup">
				<fieldset class="grupo">
					<div class="wrapper">
						<input name="cd_interno" value="{{$r1->cd_interno}}" class="txt100"   id="cd_interno" type="text" placeholder=""
							   autocomplete="false" required />
						<label for="cd_interno">Código Interno</label>
					</div>

					<div class="wrapper">
						<input name="cnpj" value="{{Utils::mask($r1->cnpj, Mask::CNPJ)}}"    class="txt120" id="cnpj" type="text" placeholder="CNPJ"
							   autocomplete="false" maxlength="18" disabled/>
						<label for="cnpj">CNPJ</label>
					</div>

					<div class="wrapper">
						<input name="ie" value="{{$r1->ie}}"    class="txt115" id="ie" type="text" placeholder="I.E"
							   autocomplete="false" maxlength="20" />
						<label for="I.E">I.E</label>
					</div>

					<div class="wrapper">
						<input name="ds_razao_social" value="{{$r1->ds_razao_social}}"  class="txt300" id="ds_razao_social" type="text" placeholder="Razão Social" disabled
							   autocomplete="false" />
						<label for="ds_razao_social">Razão Social</label>
					</div>
					<div class="wrapper">
						<input name="ds_nome_fantasia" value="{{$r1->ds_nome_fantasia}}"  class="txt200" id="ds_nome_fantasia" type="text" placeholder=""
								autocomplete="false" required />
						<label for="ds_nome_fantasia">Nome Fantasia</label>
					</div>
				</fieldset>
			</div>
			<p class="SubTituloForm"> Endereço...</p>
			<div class="container popup">
                <fieldset class="grupo">
                    <div class="wrapper">
                        <input name="cep" type="text" id="cep" value="{{Utils::mask($r1->cep, Mask::CEP)}}"  size="10" maxlength="9"
                               onblur="pesquisacep(this.value);"  onkeypress="mascara(this, 'cep')" required/>


                        <label for="cep">CEP</label>
                    </div>
                    <div class="wrapper">
                        <input value="{{$r1->ds_cidade}}" class="txt200"   id="ds_cidade" type="text" placeholder=""
                               autocomplete="false" name="ds_cidade"  required />
                        <label for="ds_cidade">Cidade</label>
                    </div>

                    <div class="wrapper">
                        <input value="{{$r1->ds_bairro}}"   class="txt200"   id="ds_bairro" type="text" placeholder=""
                               autocomplete="false" name="ds_bairro"  required/>
                        <label for="ds_bairro">Bairro</label>
                    </div>

                    <div class="wrapper">
                        <input value="{{$r1->sg_uf}}"   class="txt50"   id="sg_uf" type="text" placeholder="UF"
                               autocomplete="false" name="sg_uf"  required />
                        <label for="sg_uf">UF</label>
                    </div>

                    <div class="wrapper">
                        <input value="{{$r1->ibge}}"   class="txt50"   id="ibge" type="hidden" placeholder="IBGE"
                               autocomplete="false" name="ibge"   />
                        <label for="ibge">IBGE</label>
                    </div>
                </fieldset>
                <fieldset class="grupo">
                    <div class="wrapper">
                        <input value="{{$r1->ds_endereco}}"   class="txt350"   id="ds_endereco" type="text" placeholder=""
                               autocomplete="false" name="ds_endereco"  required/>
                        <label for="ds_endereco">Logradouro</label>
                    </div>

                    <div class="wrapper">
                        <input value="{{$r1->nu_endereco}}"   class="txt50"   id="nu_endereco" type="text" placeholder=""
                               autocomplete="false" name="nu_endereco"  required/>
                        <label for="nu_endereco">Nº</label>
                    </div>
                    <div class="wrapper">
                        <input value="{{$r1->ds_endereco_complemento}}"   class="txt150"   id="ds_endereco_complemento" type="text" placeholder=""
                               autocomplete="false" name="ds_endereco_complemento"  />
                        <label for="ds_endereco_complemento">Complemento</label>
                    </div>
                </fieldset>
			</div>
		</table>

	</div>

	<div class="panel-footer">

		{!!Form::submit('Salvar',['class'=>'btn btn-success'])!!}
	</div>





	 
</div>
