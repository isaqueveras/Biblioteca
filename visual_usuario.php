<?php  
	include_once("seguranca.php");
	$id = $_GET['id'];

	$result = mysql_query("SELECT * FROM usuarios WHERE id='$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);
?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1><i class="fa fa-users"> </i> Visualizar Usuário</h1>
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
								<b>E-mail:</b>
							</div>
							<div class="col-xs-6 col-sm-8 col-md-10">
								<?php echo $resultado['email'] ?>
							</div>
						</td>
					</tr>
					</tr>
					<tr>
						<td>
							<div class="col-xs-6 col-sm-4 col-md-2">
								<b>Matrícula:</b>
							</div>
							<div class="col-xs-6 col-sm-8 col-md-10">
								<?php echo $resultado['matricula'] ?>
							</div>
						</td>
					</tr>
					<?php  
						if($resultado['nivel_acesso_id'] == 1):
						 	$nivel_acesso_id = "Administrador";
						else:
							 $nivel_acesso_id = "Usuário";
						endif;
					?>
					<tr>
						<td>
							<div class="col-xs-6 col-sm-4 col-md-2">
								<b>Nivel de Acesso:</b>
							</div>
							<div class="col-xs-6 col-sm-8 col-md-10">
								<span class='badge badge-pill'><?php echo $nivel_acesso_id; ?></span></td>
							</div>
						</td>
					</tr>


				</tbody>
			</table>
		</div>
	</div>
	<a href="administrativo.php?link=2&id<?php echo $resultado['id']; ?>">
		<button type="button" class="btn btn-success"><i class="fa fa-chevron-circle-left"> </i> Voltar</button>
	</a>
</div>