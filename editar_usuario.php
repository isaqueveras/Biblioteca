<?php
	$id = $_GET['id'];

	// executa consulta
	$result = mysql_query("SELECT * FROM usuarios WHERE id = '$id' LIMIT 1 ");
	$resultado = mysql_fetch_assoc($result);
?>

<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1><i class="fa fa-users"> </i> Editar Usuário</h1>
  </div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_edit_usuario.php">
     		
	  	<div class="form-group">
			<label for="num" class="col-sm-2 control-label">N°</label>
			<div class="col-sm-2">
			  <input min="1" max="60" id="num" type="number" class="form-control" name="num" placeholder="Numero da chamada" required="" value="<?php echo $resultado['numero']; ?>">
			</div>
		</div>

		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Completo" required="" value="<?php echo $resultado['nome']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" name="email" placeholder="E-mail" required="" value="<?php echo $resultado['email']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputMatri" class="col-sm-2 control-label">Matrícula</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="matricula" placeholder="Matrícula" required value="<?php echo $resultado['matricula']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" name="senha" placeholder="Senha" required="" value="<?php echo $resultado['senha']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Nivel de Acesso</label>
			<div class="col-sm-2">
			  <select class="form-control" name="nivel_de_acesso" required="">

				  <option value="1"
				  	<?php 
				  		if ($resultado['nivel_acesso_id'] == 1) {
				  			echo 'Selected';
				  		}
				  	?>
				  >Administrativo</option>
				  <option value="2"
				  	<?php 
				  		if ($resultado['nivel_acesso_id'] == 2) {
				  			echo 'Selected';
				  		}
				  	?>
				  >Usuário</option>
				</select>
			</div>
		  </div>
		  
		  <input type="hidden" name="id" value="<?php echo $resultado['id'] ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-primary"><i class="fas fa-users"> </i> Editar Usuário</button>
			  <a href="administrativo.php?link=2" class="btn btn-danger"><i class="fas fa-chevron-circle-left"> </i> Cancelar</a>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

