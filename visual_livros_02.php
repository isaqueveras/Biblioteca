<?php  
	include_once("seguranca_usu.php");
	$id = $_GET['id'];

	$result = mysql_query("SELECT * FROM livros WHERE id='$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1><i class="fas fa-book"> </i> Visualizar Livro</h1>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-responsivel">
				<tbody>
					
					<tr>
						<td>
							<div class="col-xs-6 col-sm-4 col-md-2">
								<b>Nome:</b>
							</div>
							<div class="col-xs-6 col-sm-8 col-md-10">
								<?php echo $resultado['nome'] ?>
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="col-xs-6 col-sm-4 col-md-2">
								<b>Autor:</b>
							</div>
							<div class="col-xs-6 col-sm-8 col-md-10">
								<?php echo $resultado['autor'] ?>
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="col-xs-6 col-sm-4 col-md-2">
								<b>Categoria:</b>
							</div>
							<div class="col-xs-6 col-sm-8 col-md-10">
								<?php echo $resultado['categoria']; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="col-xs-6 col-sm-4 col-md-2">
								<b>Quantidade:</b>
							</div>
							<div class="col-xs-6 col-sm-8 col-md-10">
								<?php echo $resultado['quantidade']; ?>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<b>Sinopse: </b> <?php echo $resultado['descricao']; ?>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<a href="usuario.php?link=10">
		<button type="button" class="btn btn-warning"><i class="fas fa-chevron-circle-left"> </i> Voltar</button>
	</a>

	<?php  
		if ($resultado['quantidade'] != 0) { ?>
			<!-- Botão de Resevar -->
			<a href="processa/proc_reservar_livros.php?id=<?php echo $resultado['id']; ?>">
				<button type="button" class="btn btn-success"><i class="fas fa-book"> </i> Agendar Livro</button>
			</a>
		<?php }else{ ?>
			<!-- Botão de Resevar -->
			
				<button type="button" class="btn btn-danger" disabled><i class="fas fa-book"> </i> Livros Esgotados</button>
		 <?php } 
	?>
</div>