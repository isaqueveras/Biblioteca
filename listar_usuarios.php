<?php  
	include_once("conexao.php");

	$resultado = mysql_query("SELECT * FROM usuarios ORDER BY id DESC");
	$linhas = mysql_num_rows($resultado);
?>

<div class="container theme-showcase" role="main">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="administrativo.php">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"> </i> Lista de Usuários </li>
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

	<div class="col-12">
   	<!-- Formulario de Pesquisa -->
    <form method="GET" action="pesquisa_usuarios.php">
      <div class="col-md-12">
       	<div class="form-group">
          <!-- campo de Pesquisa -->
          <div class="input-group">
						<input required type="text" name="pesquisa" class="form-control" id="pesquisa" placeholder="Pesquisar Usuarios">
						<span class="input-group-btn">
							<button class="btn btn-default btn-block"><span class='glyphicon glyphicon-zoom-in'> </span> Pesquisar</button>
						</span>
					</div>
				</div>
      </div>
		</form><!-- Fim do Formulário -->
  </div>

		<div class="col-md-12">
			
			<div class="table-responsive">
				<table class="table table-striped table-hover table-responsive">
					<thead  style="background: #e8e8e8; color: #3e3e3e;">
						<tr>
							<th>N°</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Matrícula</th>
							<th>Nivel de Acesso</th>
							<th>Status</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							
							while($linhas = mysql_fetch_array($resultado)){
								
								// Identifca se o usuario é Administrador ou Usuario
								if($linhas['nivel_acesso_id'] == 1):
									$nivel_acesso_id = "Administrador";
								else:
									$nivel_acesso_id = "Usuário";
								endif;
								// Verifica se o usuario esta online ou não
								if ($linhas['status'] == 1) {
									$status = '<i class="fa fa-bullseye text-success"> </i> <b class="text-success">Online</b>';
								}else{
									$status = '<i class="fa fa-bullseye text-danger"> </i> <b class="text-danger">Offline</b>';
								}

								echo "<tr>";
									echo "<td>". $linhas['numero'] ."</td>";
									echo "<td>". $linhas['nome'] ."</td>";
									echo "<td>". $linhas['email'] ."</td>";
									echo "<td><span class='badge badge-pill' style='background:#2aabd2;'>". $linhas['matricula'] ."<span></td>";
									echo "<td>". $nivel_acesso_id."</td>";
									echo "<td>". $status ."</td>";
						?>
							<?php if($_SESSION['admNivelAcesso'] == 1){ ?>
								<td>
									<a href="administrativo.php?link=5&id=<?php echo $linhas['id']; ?>">
									<button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="bottom" title="Exibir" data-original-title="Exibir"><i class="fa fa-list-ul"> </i> Exibir</button></a>

									<a href="administrativo.php?link=4&id=<?php echo $linhas['id']; ?>">
									<button type="button" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar" data-original-title="Editar"><i class="fa fa-edit"> </i> Editar</button></a>

									<a href='#' data-toggle="modal" data-target="#apagar_usu-<?php echo $linhas['id']; ?>">
									<button type='button' class='btn btn-xs btn-danger' data-toggle="tooltip" data-placement="bottom" title="Excluir" data-original-title="Excluir"><i class="icon fa fa-trash"> </i> Excluir</button></a>

									<a href="print_usuario.php?id=<?php echo $linhas['id']; ?>">
									<button type="button" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="bottom" title="PDF" data-original-title="PDF"><i class="fa fa-file-pdf"> </i> PDF</button></a>

											<div class="modal fade" id="apagar_usu-<?php echo $linhas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"> </i> ATENÇÃO</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-body">
														<h5>Você deseja realmente apagar o usúario <strong><?php echo $linhas['nome']; ?></strong>?</h5>
													</div>

													<div class="modal-footer">
														<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Não </button>
														<a href="processa/proc_apagar_usuario.php?id=<?php echo $linhas['id']; ?>" class="btn btn-danger"><i class="fa fa-check"></i> Sim</a>
													</div>

												</div>
											</div>
										</div>

								</td>

							<?php }else if($_SESSION['usuarioNivelAcesso'] == 2){ ?>
								<td>
									<a href="usuario.php?link=8&id=<?php echo $linhas['id']; ?>">
									<button type="button" class="btn btn-sm btn-primary"><i class="fa fa-list-ul"> </i> Exibir</button></a>
								</td>
							<?php } ?>
							
						<?php echo "</tr>"; } 	?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>