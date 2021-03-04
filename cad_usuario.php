<?php  
	include_once("seguranca_adm.php");
?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1><i class="fa fa-users"> </i> Cadastro de Usuário</h1>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="processa/proc_cad_usuario.php">
				
				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Numero:</label>
					<div class="col-sm-10">
						<input type="text" name="num" class="form-control" placeholder="informe o seu numero da chamada" required autofocus>
					</div>
				</div>

				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Nome:</label>
					<div class="col-sm-10">
						<input type="text" name="nome" class="form-control" placeholder="informe o Nome" required autofocus>
					</div>
				</div>

				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">E-mail:</label>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control" placeholder="informe o E-mail" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputMatri" class="col-sm-2 control-label">Matrícula:</label>
					<div class="col-sm-10">
						<input type="text" name="matricula" class="form-control" placeholder="informe a Matrícula" required>
					</div>
				</div>

				<div class="form-group">
					<label for="inputSenha" class="col-sm-2 control-label">Senha:</label>
					<div class="col-sm-10">
						<input type="password" name="senha" class="form-control" placeholder="informe a Senha" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" for="InputNivel">Nivel de Usuário:</label>
					<div class="col-sm-10">
						<select class="form-control" name="nivel_de_acesso">
							<option>-- SELECIONE --</option>
							<option value="1">Administrador</option>
							<option value="2">Usuário</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary"><i class="fas fa-users"> </i> Cadastrar Usuário</button>
						<a href="administrativo.php?link=2" class="btn btn-danger"><i class="fas fa-chevron-circle-left"> </i> Voltar</a>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
