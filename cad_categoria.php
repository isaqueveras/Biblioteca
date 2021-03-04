<?php  
	include_once("seguranca_adm.php");
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1><i class="fas fa-book"> </i> Cadastrar Categoria de Livros</h1>
	</div>
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
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="processa/proc_cad_categoria.php">

				<div class="form-group">
					<label for="inputNome" class="col-sm-2 control-label">Nome:</label>
					<div class="col-sm-10">
						<input type="text" name="nome_categoria" class="form-control" placeholder="Informe o nome do livro" required autofocus>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary"><i class="fas fa-bars"> </i> Cadastrar Categoria</button>
						<a href="administrativo.php?link=12" class="btn btn-danger"><i class="fas fa-chevron-circle-left"> </i> Voltar</a>
					</div>
				</div>

			</form>
		</div>
	</div>
</div> 