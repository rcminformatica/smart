<!-- PROFILE -->
@inject('cep', 'Smart\Cep\Cep')



<div class="panel panel-default">
	<div class="panel-heading">
		<div class="TituloForm"><i class="fa fa-building"></i> Editar Usuário </div>

</div>
	<div class="panel-body">
		@foreach($usuarios as $r1)
		<table class="table table-bordered">
			<!--HIDDEN -->
            <input name="cd_empresa" value="{{$r1->cd_empresa}}" class="txt100"   id="cd_empresa" type="hidden" placeholder=""
                   autocomplete="false" />
			<input name="id" value="{{$r1->id}}" class="txt100"   id="id" type="hidden" placeholder=""
				   autocomplete="false" />

			<div class="container popup">
				<fieldset class="grupo">
					<div class="wrapper">
						<input name="id" value="{{$r1->id}}" class="txt100"   id="id" type="text" placeholder=""
							   autocomplete="false"  disabled/>
						<label for="id">Cod.</label>
					</div>

					<div class="wrapper">
						<input name="nm_usuario" value="{{$r1->nm_usuario}}"    class="txt120" id="nm_usuario" type="text" placeholder="Nome"
							   autocomplete="false" maxlength="100" required/>
						<label for="nm_usuario">Nome</label>
					</div>

					<div class="wrapper">
						<input name="email" value="{{$r1->email}}"    class="txt115" id="email" type="text" placeholder="E-mail"
							   autocomplete="false" maxlength="100" disabled />
						<label for="email">E-mail</label>
					</div>


				</fieldset>
			</div>
			<p class="SubTituloForm"> Contatos...</p>
			<div class="container popup">
                <fieldset class="grupo">
                    <div class="wrapper">
                        <input name="nu_telefone" type="text" id="nu_telefone" value=""  size="15" maxlength="15"
                                />


                        <label for="nu_telefone">Telefone</label>
                    </div>

                </fieldset>

			</div>
		</table>
		@endforeach
	</div>

	<div class="panel-footer">

		{!!Form::submit('Salvar',['class'=>'btn btn-primary'])!!}
	</div>





	 
</div>
