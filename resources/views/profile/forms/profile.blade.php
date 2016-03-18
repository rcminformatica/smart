<!-- PROFILE -->
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="TituloForm">Minha Empresa </div>
</div>
	<div class="panel-body">
		@foreach($empresa as $r1)
		<table class="table table-bordered">

			<div class="container popup">
				<div class="wrapper">
					<input name="cd_interno" value="{{$r1->cd_interno}}" class="txt100"   id="cd_interno" type="text" placeholder=""
						   autocomplete="false" />
					<label for="cd_interno">Código Interno</label>
				</div>

				<div class="wrapper">
					<input name="cnpj" value="{{Utils::mask($r1->cnpj, Mask::CNPJ)}}"    class="txt115" id="cnpj" type="text" placeholder="CNPJ"
						   autocomplete="false" maxlength="18" disabled/>
					<label for="cnpj">CNPJ</label>
				</div>

				<div class="wrapper">
					<input name="ie" value="{{$r1->ie}}"    class="txt115" id="ie" type="text" placeholder="I.E"
						   autocomplete="false" maxlength="20" />
					<label for="I.E">I.E</label>
				</div>

				<div class="wrapper">
					<input name="ds_razao_social" value="{{$r1->ds_razao_social}}"  class="txt350" id="ds_razao_social" type="text" placeholder="Razão Social" disabled
						   autocomplete="false" />
					<label for="ds_razao_social">Razão Social</label>
				</div>
				<div class="wrapper">
					<input name="ds_nome_fantasia"  class="txt250" id="ds_nome_fantasia" type="text" placeholder=""
							autocomplete="false" />
					<label for="ds_nome_fantasia">Nome Fantasia</label>
				</div>
			</div>
			<p class="SubTituloForm"> Endereço...</p>
			<div class="container popup">
				<div class="wrapper">
					<input name="cep" value="{{Utils::mask($r1->cep, Mask::CEP)}}"   class="txt100"   id="cep" type="text" placeholder="CEP"
						   autocomplete="false"   required/>
					<label for="cep">CEP</label>
				</div>
				<div class="wrapper">
					<input value="{{$r1->ds_cidade}}"   class="txt200"   id="ds_cidade" type="text" placeholder=""
						   autocomplete="false" name="ds_cidade"  disabled/>
					<label for="ds_cidade">Cidade</label>
				</div>
				<div class="wrapper">
					<input value="{{$r1->sg_uf}}"   class="txt50"   id="sg_uf" type="text" placeholder="UF"
						   autocomplete="false" name="ds_uf"  disabled/>
					<label for="sg_uf">UF</label>
				</div>

				<div class="wrapper">
					<input value="{{$r1->ds_endereco}}"   class="txt350"   id="ds_endereco" type="text" placeholder=""
						   autocomplete="false" name="ds_endereco"  disabled/>
					<label for="ds_endereco">Logradouro</label>
				</div>
				<div class="wrapper">
					<input value="{{$r1->nu_endereco}}"   class="txt50"   id="nu_endereco" type="text" placeholder=""
						   autocomplete="false" name="nu_endereco"  required/>
					<label for="nu_endereco">Nº</label>
				</div>
				<div class="wrapper">
					<input value="{{$r1->ds_endereco_complemento}}"   class="txt100"   id="ds_endereco_complemento" type="text" placeholder=""
						   autocomplete="false" name="ds_endereco_complemento"  />
					<label for="ds_endereco_complemento">Complemento</label>
				</div>

			</div>
		</table>
		@endforeach
	</div>

	<div class="panel-footer">

		{!!Form::submit('Cadastrar',['class'=>'btn btn-primary'])!!}
	</div>
</div>
