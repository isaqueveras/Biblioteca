<?php
	$id = $_GET['id'];
	// executa consulta
	$result = mysql_query("SELECT * FROM categoria_livro WHERE id = '$id' LIMIT 1 ");
	$resultado = mysql_fetch_assoc($result);
?>

<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1><i class="fas fa-bars"> </i> Editar Categoria</h1>
  </div>
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_editar_categoria.php">
	    
		<div class="form-group">
			<label for="inputNome" class="col-sm-2 control-label">Nome:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" name="nome" placeholder="Nome" required="" value="<?php echo $resultado['nome']; ?>">
			</div>
		</div>
		  
		<input type="hidden" name="id" value="<?php echo $resultado['id'] ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-primary"><i class="fas fa-bars"> </i> Editar Categoria</button>
			  <a href="administrativo.php?link=20" class="btn btn-danger"><i class="fas fa-chevron-circle-left"> </i> Cancelar</a>
			</div>
		</div>
	  </form>
	</div>
	</div>
</div> <!-- /container -->

