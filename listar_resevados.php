<?php  
	include_once("conexao.php");

	$resultado = mysql_query("SELECT * FROM resevados ORDER BY id DESC LIMIT 15");
	$linhas = mysql_num_rows($resultado);

	$book = mysql_query("SELECT * FROM livros ORDER BY 'id'");
	$livros = mysql_num_rows($book);
?>
<div class="container theme-showcase" role="main">
	
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="administrativo.php">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-book-reader"> </i> Lista de Livros Agendados </li>
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
						<table class="table table-striped table-hover table-responsive">
							<thead style="background: #e8e8e8; color: #3e3e3e;">
								<tr>
									<th>Nome do Livro</th>
									<th>Nome do Usuário</th>
									<th>E-mail</th>
									<th>Matrícula</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
							
								<?php  
									while($linhas = mysql_fetch_array($resultado)){
										echo "<tr>";
											echo "<td>". $linhas['nome_livro'] ."</td>";
											echo "<td>". $linhas['nome_usuario'] ."</td>";
											echo "<td>". $linhas['email_usuario'] ."</td>";
											echo "<td><span class='badge badge-pill'>". $linhas['matricula'] ."</span></td>";
								?>
									<?php if($_SESSION['admNivelAcesso'] == 1){ ?>
									<td>
										
										<?php
											if ($linhas['status'] == 1) { ?>
												<a href='#' data-toggle="modal" data-target="#autorizar-<?php echo $linhas['id']; ?>">
												<button type='button' class='btn btn-sm btn-warning'><span class='glyphicon glyphicon-ok'> </span> Autorizar</button></a>
											<?php }else{ ?>
												<a href='#' data-toggle="modal" data-target="#apagar_pro-<?php echo $linhas['id']; ?>">
												<button type='button' class='btn btn-sm btn-success'><i class="icon fa fa-book-reader"></i> Devolução </button></a>
										<?php	} ?>

												<div class="modal fade" id="apagar_pro-<?php echo $linhas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
													<div class="modal-dialog modal-sm" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"> </i> ATENÇÃO</h5>
															</div>

															<div class="modal-body">
																<h5>Você deseja fazer a devolução do livro <strong><?php echo $linhas['nome_livro']; ?></strong>?</h5>
															</div>

															<div class="modal-footer">
																<a href="processa/proc_devolucao_reservas.php?id_livro=<?php echo $linhas['id_livro']; ?>&id_reseva=<?php echo $linhas['id']; ?>&quant=<?php echo $linhas['quant_livros']; ?>" class="btn btn-danger"><i class="fa fa-check"></i> Sim</a>
																<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Não </button>
															</div>

														</div>
													</div>
												</div>

												<!-- Modal Autorizar -->
												<div class="modal fade" id="autorizar-<?php echo $linhas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
													<div class="modal-dialog modal-sm" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"> </i> ATENÇÃO</h5>
															</div>

															<div class="modal-body">
																<h5>Você deseja AUTORIZAR o livro <strong><?php echo $linhas['nome_livro']; ?></strong>?</h5>
															</div>

															<div class="modal-footer">
																<a href="processa/proc_autorizar_livro.php?id=<?php echo $linhas['id']; ?>" class="btn btn-danger"><i class="fa fa-check"></i> Sim</a>
																<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Não </button>
															</div>

														</div>
													</div>
												</div>


									</td>
									<?php }else if($_SESSION['usuarioNivelAcesso'] == 2){ ?>
										<td>
											<a href="usuario.php?link=11&id=<?php echo $linhas['id']; ?>">
											<button type="button" class="btn btn-sm btn-primary"><i class="fa fa-list-ul"> </i> Exibir</button></a>
										
											<!-- Botão de Resevar -->
											<a href="processa/proc_reservar_livros.php?id=<?php echo $livros['id']; ?>">
												<button type="button" class="btn btn-sm btn-warning"><i class="fas fa-book-reader"> </i> Reservar Livro</button>
											</a>
										</td>
									<?php } ?>

								<?php echo "</tr>"; } 	?>
							</tbody>
						</table>
					</div>
				<?php } else { ?>
					<div class="panel well well-lg panel-default">
						<h1>Não Existe nenhum livro Agendados!</h1>
						<p>Aguarde algum aluno agendar um livro.</p>
					</div>
				<?php } ?>
				
		</div>
	</div>
</div>


