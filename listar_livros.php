<?php  
	include_once("conexao.php");

	$resultado = mysql_query("SELECT * FROM livros ORDER BY 'id'");
	$linhas = mysql_num_rows($resultado);

	if ($_SESSION['admNivelAcesso'] == 1) {
		$link = "administrativo.php";
	} else {
		$link = "usuario.php";
	} 
	
?>
<div class="container theme-showcase" role="main">

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="<?php echo $link; ?>">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-book"> </i> Lista de Livros </li>
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
            <?php unset ($_SESSION['proc']);
      	endif;
	?>

	<div class="row">
		<div class="col-md-12">
		  <?php 
		  	if ($linhas > 0) { ?>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead style="background: #e8e8e8; color: #3e3e3e;">
							<tr>
								<th>Nome do Livro</th>
								<th>Categoria</th>
								<th>Quantidade</th>
								<th>Status</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								while($linhas = mysql_fetch_array($resultado)){

									if ($linhas['quantidade'] == 1) {
										$quantidade = "<td><span class='badge badge-pill' style='color: white;background:red;'>". $linhas['quantidade']."</span></td>";
									}else if($linhas['quantidade'] == 0){
										$quantidade = "<td><span class='badge badge-pill'>". $linhas['quantidade']."</span></td>";
									}else{
										$quantidade = "<td><span class='badge badge-pill' style='color: white;background:#5bc0de;'>". $linhas['quantidade']."</span> </td>";
									}

									if ($linhas['quantidade'] == 1) {
										$status = " <i class='fa fa-fire'> </i> Disponivel";
									} else if($linhas['quantidade'] == 0){
										$status = " <i class='fa fa-ban'> </i> Esgotado";
									}else{
										$status = "<i class='fa fa-book'> </i> Disponíveis";
									}
									

									echo "<tr>";
										echo "<td>". $linhas['nome'] ."</td>";
										echo "<td>". $linhas['categoria'] ."</td>";
										echo $quantidade;
										echo "<td><span class='badge badge-pill'>". $status ."</span></td>";
							
							if($_SESSION['admNivelAcesso'] == 1){ ?>

								<td>
									<a href="visual_livro.php?id=<?php echo $linhas['id']; ?>">
									<button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Exibir" data-original-title="Exibir"><i class="fa fa-list-ul"> </i> Exibir</button></a>

									<a href="administrativo.php?link=14&id=<?php echo $linhas['id']; ?>">
									<button type="button" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar"><i class="fa fa-edit"> </i> Editar</button></a>

									<a href='#' data-toggle="modal" data-target="#apagar_pro-<?php echo $linhas['id']; ?>">
									<button type='button' class='btn btn-xs btn-danger' data-toggle="tooltip" data-placement="top" title="Excluir" data-original-title="Excluir"><i class="icon fa fa-trash"> </i> Excluir</button></a>
									
									<a href="print_livro.php?id=<?php echo $linhas['id']; ?>">
									<button type="button" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="PDF" data-original-title="PDF"><i class="fa fa-file-pdf"> </i> PDF</button></a>

											<div class="modal fade" id="apagar_pro-<?php echo $linhas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"> </i> ATENÇÃO</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-body">
															<h5>Você deseja realmente apagar o livro?</h5>
														</div>

														<div class="modal-footer">
															<a href="processa/proc_apagar_livro.php?id=<?php echo $linhas['id']; ?>" class="btn btn-success"><i class="fa fa-check"></i> Sim</a>
															<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Não </button>
														</div>

													</div>
												</div>
											</div>

								</td>
								<?php }else if($_SESSION['usuarioNivelAcesso'] != 1){ ?>
									<td>
										<a href="visual_livro.php?id=<?php echo $linhas['id']; ?>">
										<button type="button" class="btn btn-sm btn-default"><i class="fa fa-list-ul"> </i> Exibir</button></a>
										
										<?php  
											if ($linhas['quantidade'] != 0) { ?>
												<!-- Botão de Resevar -->
												
												<button data-toggle="modal" data-target="#agendar-<?php echo $linhas['id']; ?>" type="button" class="btn btn-sm btn-success"><i class="fas fa-book-reader"> </i> Agendar Livro</button>

												<div class="modal fade" id="agendar-<?php echo $linhas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"> </i> ATENÇÃO</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-body">
															<h5>Você deseja realmente agendar o livro <strong><?php echo $linhas['nome']; ?></strong>?</h5>
														</div>

														<div class="modal-footer">
															<a href="processa/proc_reservar_livros.php?id=<?php echo $linhas['id']; ?>&quant=<?php echo $linhas['quantidade']; ?>" class="btn btn-success"><i class="fa fa-check"></i> Sim</a>
															<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Não </button>
														</div>

													</div>
												</div>
											</div>

											<?php }else{ ?>
												<!-- Botão de Resevar -->
												<a href="">
													<button type="button" class="btn btn-sm btn-danger" disabled><i class="fas fa-book"> </i> Esgotado</button>
												</a> <?php } ?>
										
									</td>
								<?php } ?>

							<?php echo "</tr>"; } 	?>
						</tbody>
					</table>
				</div>	  
			<?php } else { ?>
				  <!-- Card de Cadastrar um Livro -->
				  <div class="panel well well-lg panel-default">
					<h1>Cadastre o primeiro Livro!</h1>
					<p>Comece agora: basta clicar no botão abaixo</p>
					<a class="btn btn-success" href="administrativo.php?link=13">Cadastrar Livro</a>
				  </div>
			<?php } ?>
		</div>
	</div>
</div>
<!--JS de Informações dos botões-->
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>
