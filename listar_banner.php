<?php  
	include_once("conexao.php");

	$resultado = mysql_query("SELECT * FROM banner ORDER BY id DESC LIMIT 24");
	$linhas = mysql_num_rows($resultado);
?>
<style>
	.card-biblioteca{
		border:solid .5px #f1f1f1;
		padding:7px;
	}
	.card-biblioteca:hover{
		transition:.5s;
		border:solid .5px #000;
	}
</style>
<div class="container theme-showcase" role="main">
	
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="administrativo.php">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-images"> </i> Lista de Banners </li>
	  </ol>
	</nav>
	
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
      <?php unset($_SESSION['proc']);
    endif;
	?>
	
	<div class="row">

		<div class="col-12">
			<?php  
				if ($linhas > 0) {
					while($linhas = mysql_fetch_array($resultado)){ ?>

                    <div class="col-md-3">
                        <div class="card list-group-item card-biblioteca" style="margin-bottom:10px;">
                            <img class="img-responsive" src="imagens/banner/<?php echo $linhas['img']; ?>" width="100%" style="height:150px;">
                            <div class="card-body">
                                <h4><?php echo $linhas['titulo']; ?></h4>
                                <p class="card-text text-justify"><?php echo $linhas['texto']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">

																		<!-- Botão de Editar -->
																		<a href="administrativo.php?link=24&id=<?php echo $linhas['id']; ?>">
																			<button type="button" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar" data-original-title="Editar"><i class="fa fa-edit"> </i> Editar</button>
																		</a>
                                    <!-- Botão de Excluir -->
																		<a href='#' data-toggle="modal" data-target="#apagar_banner-<?php echo $linhas['id']; ?>">
																			<button type='button' class='btn btn-xs btn-danger' data-toggle="tooltip" data-placement="bottom" title="Excluir" data-original-title="Excluir"><i class="icon fa fa-trash"></i> Excluir</button>
																		</a>

																		<div class="modal fade" id="apagar_banner-<?php echo $linhas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
																			<div class="modal-dialog modal-sm" role="document">
																				<div class="modal-content">
																					<div class="modal-header">
																						<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"> </i> ATENÇÃO</h5>
																					</div>

																					<div class="modal-body text-center">
																						<h5>Você deseja apagar o Banner?</h5>
																					</div>

																					<div class="modal-footer">
																						<a href="processa/apagar_banner.php?id=<?php echo $linhas['id']; ?>&img=<?php echo $linhas['img']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-check"></i> Sim</a>
																						<button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar </button>
																					</div>

																				</div>
																			</div>
																		</div>

                                  </div>
																	<small class="text-muted" style="float:right;"><?php echo $linhas['criado']; ?></small>
																		
                                </div>
                            </div>
                        </div>
                    </div>

								<?php }

								}else{ ?>
									<div class="panel well well-lg panel-default">
										<h1>Cadastre o primeiro Banner!</h1>
										<p>Comece agora: basta clicar no botão abaixo</p>
										<a class="btn btn-success" href="administrativo.php?link=23">Cadastrar Banner</a>
								</div>
							<?php	}
			?>
		</div>
	</div>
</div>