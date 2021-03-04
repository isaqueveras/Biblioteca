<?php 
	session_start();
	include_once("conexao.php");
	$id = $_GET['id'];

	$result = mysql_query("SELECT * FROM livros WHERE id='$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
	
	if ($_SESSION['admNivelAcesso'] == 1) {
		$link = "administrativo.php?link=12";
		include_once("seguranca_adm.php");
	} else {
		$link = "usuario.php?link=10";
		include_once("seguranca_usu.php");
	}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Detalhes do Livro <?php echo $resultado['nome'] ?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		.border-bottom-iv{
			border-bottom: solid 4px whitesmoke;
		}
	</style>
	<!-- Favicon -->
    <link rel="shortcut icon" href="imagens/favicon.png">
</head>
<body>

<div class="container theme-showcase" role="main">
	<h2 class="text-center border-bottom-iv" style="background:#f8f8f8;padding:10px;"><?php echo $resultado['nome'] ?></h2><hr>

	<div class="row">
		<div class="col-md-12">
	
			<div class="col-md-3">
				<img src="imagens/livros/<?php echo $resultado['img']; ?>" alt="" class="img-responsive img-thumbnail"><br><br>
				<?php  
					if ($_SESSION['admNivelAcesso'] != 1) {
						if ($resultado['quantidade'] != 0) { ?>
							<!-- Botão de Resevar -->
							<a href="processa/proc_reservar_livros.php?id=<?php echo $resultado['id']; ?>" type="button" class="btn btn-block btn-success"><i class="fas fa-book"> </i> Agendar Livro</a><br>
						<?php }else{ ?>
							<!-- Botão de Resevar -->
							<button type="button" class="btn btn-block btn-danger" disabled><i class="fas fa-book"> </i> Livro Esgotado</button>
						<?php }
					} 
				?>
				<a href="<?php echo $link; ?>" type="button" class="btn btn-default btn-block">Voltar</a>
			</div><br>

			<div class="col-md-9">
					<table class="table table-striped table-hover">
						<tbody>
							<tr>
								<td>
									<div class="col-md-12">
										<b>Autor:</b> <?php echo $resultado['autor'] ?>
									</div>
								</td>
							</tr>

							<tr>
								<td>
									<div class="col-md-12">
										<b>Categoria:</b> <?php echo $resultado['categoria']; ?>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="col-md-12 text-justify">
										<b>Sinopse:</b> <?php echo $resultado['descricao']; ?>
									</div>
								</td>
							</tr>

						</tbody>
					</table>	

			</div>

		</div>
	</div>
	
	</div>
</body>
</html>