<?php
	$id = $_GET['id'];
	include "seguranca_usu.php";
?>

<div class="container theme-showcase" role="main">      
	
  	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="usuario.php">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user"> </i> Meu Perfil</li>
	  </ol>
	</nav>

  <div class="row">
	<div class="col-md-12">

	<?php 

		if(isset($_SESSION['cor'])):
			$cor = $_SESSION['cor'];
			unset ($_SESSION['cor']);
		endif;

	  	if(isset($_SESSION['proc'])): ?>
            <div class="alert alert-<?php echo $cor; ?>" role="alert">
	  			<?php echo $_SESSION['proc']; ?>
	  			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	  		</div>  
            <?php unset ($_SESSION['proc']);
      endif;
	?>

	  <form class="form-horizontal" method="POST" action="processa/proc_edit_profile_usu.php">
		  <div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome Completo" required="" value="<?php echo $_SESSION['usuarioNome']; ?>">
			</div>
		  </div>
		  
		  <div class="form-group">
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" name="email" placeholder="E-mail" required="" value="<?php echo $_SESSION['usuarioEmail']; ?>">
			</div>
		  </div>

		  <div class="form-group">
			<label class="col-sm-2 control-label">Matrícula</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="matricula" placeholder="Usuário" disabled="" value="<?php echo $_SESSION['usuarioMatricula']; ?>">
			</div>
		  </div>

		  <div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" name="senha" placeholder="Senha" required="" value="<?php echo $_SESSION['usuarioSenha']; ?>">
			</div>
		  </div>

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Cor do Template</label>
			<div class="col-sm-10">
			  <select class="form-control" name="cor_template" required="">

				  <option value="default"
				  	<?php 
				  		if ($_SESSION['usuarioColor'] == "default") {
				  			echo 'Selected';
				  		}
				  	?>
				  >Branco</option>
				  <option value="inverse"
				  	<?php 
				  		if ($_SESSION['usuarioColor'] == "inverse") {
				  			echo 'Selected';
				  		}
				  	?>
				  >Verde</option>
				</select>
			</div>
		  </div>
		  
		  <input type="hidden" name="id" value="<?php echo $_SESSION['usuarioId']; ?>">
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-primary"><i class="fas fa-user"> </i> Editar Perfil</button>
			  <a href="usuario.php" class="btn btn-danger"><i class="fas fa-chevron-circle-left"> </i> Cancelar</a>
			</div>
		  </div>
		</form>
	</div>
	</div>
</div> <!-- /container -->

