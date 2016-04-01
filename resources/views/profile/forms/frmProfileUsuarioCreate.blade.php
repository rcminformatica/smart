<!-- PROFILE -->
@inject('cep', 'Smart\Cep\Cep')


<div class="panel panel-default">
	<div class="panel-heading">
		<div class="TituloForm"><i class="fa fa-building"></i> Adicionar Usuário </div>

</div>
	<div class="panel-body">

		<table class="table table-bordered">
			<!--HIDDEN -->
			<div class="container popup">
				<fieldset class="grupo">

					<div class="wrapper">
						<input name="nm_usuario" value=""    class="txt120" id="nm_usuario" type="text" placeholder="Nome"
							   autocomplete="false" maxlength="100" required/>
						<label for="nm_usuario">Nome</label>
					</div>

					<div class="wrapper">
						<input name="email" value=""    class="txt115" id="email" type="text" placeholder="E-mail"
							   autocomplete="false" maxlength="100" required />
						<label for="email">E-mail</label>
					</div>
					<div class="wrapper">
						<input name="cd_senha" value=""    class="txt115" id="cd_senha" type="password" placeholder="Senha"
							   autocomplete="false" maxlength="20" required />
						<label for="cd_senha">Senha</label>
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

	</div>

	<div class="panel-footer">

		{!!Form::submit('Salvar',['class'=>'btn btn-success'])!!}
	</div>





	 
</div>
