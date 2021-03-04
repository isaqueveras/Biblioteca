<?php  
	include_once("conexao.php");

	$resultado = mysql_query("SELECT * FROM categoria_livro ORDER BY 'id' ");
	$linhas = mysql_num_rows($resultado);
?>
<div class="container theme-showcase" role="main">
	
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="administrativo.php">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-bars"> </i> Lista de Categorias</li>
	  </ol>
	</nav>

	<?php 
		// Estrutura de decisão
		if(isset($_SESSION['cor'])):
			$cor = $_SESSION['cor'];
			unset ($_SESSION['cor']);
		endif;
		// Estrutura de decisão
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
			<table class="table table-striped table-hover">
				<thead style="background: #e8e8e8; color: #3e3e3e;">
					<tr>
						<th width="150">Nome</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php  
						while($linhas = mysql_fetch_array($resultado)){
							echo "<tr>";
								echo "<td width='150'>". $linhas['nome'] ."</td>";
					?>
						<?php if($_SESSION['admNivelAcesso'] == 1){ ?>
						<td>
							<a href="administrativo.php?link=9&id=<?php echo $linhas['id']; ?>">
							<button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar" data-original-title="Editar"><i class="fa fa-edit"> </i> </button></a>

							<a href='#' data-toggle="modal" data-target="#apagar_pro-<?php echo $linhas['id']; ?>">
							<button type='button' class='btn btn-sm btn-danger' data-toggle="tooltip" data-placement="bottom" title="Excluir" data-original-title="Excluir"><i class="icon fa fa-trash"></i> </button></a>

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
													<h5>Você deseja realmente apagar essa categoria?</h5>
												</div>

												<div class="modal-footer">
													<a href="processa/proc_apagar_categoria.php?id=<?php echo $linhas['id']; ?>" class="btn btn-success"><i class="fa fa-check"></i> Sim</a>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Não </button>
												</div>

											</div>
										</div>
									</div>
						</td>
						<?php }else if($_SESSION['usuarioNivelAcesso'] == 2){ ?>
							<td>
								<a href="usuario.php?link=9&id=<?php echo $linhas['id']; ?>">
							<button type="button" class="btn btn-sm btn-primary"><i class="fa fa-list-ul"> </i> Exibir</button></a>
							</td>
						<?php } ?>


					<?php echo "</tr>"; } 	?>
				</tbody>
			</table>

			<center>
				<nav aria-label="Page navigation">
				  <ul class="pagination">
				    <li>
				      <a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li>
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</center>
			
		</div>
	</div>
</div>