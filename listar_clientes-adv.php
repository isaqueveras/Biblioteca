
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel Administrativo da Biblioteca Prof Plácido Aderaldo Castelo</title>
    <meta name="description" content="Painel Administrativo - Isaque Veras">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/ie10-viewport-bug-workaround.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/ie10-emulation-modes-warning.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="imagens/favicon.png">
	<script src="js/dataehora.js"></script>
	
   </head>
   <style type="text/css">
   		.img{
   			margin-top: -70px;
   			height: 60px;
   		}
   		.img-r{
   			margin-top: -60px;
   			height: 60px;
   			float: right;
   		}
   </style>
<body>
	<img src="imagens/logo_top.PNG" class="img-responsive img">
	<img src="imagens/logo_top_r.png" class="img-responsive img-r">
	<!-- Inicio NavBar -->
<nav class="navbar navbar-default" style="background: #fff;border-radius:0;border:none;box-shadow:none;border-bottom:1px solid #f1f1f1;border-top:1px solid #f1f1f1;">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
						<a class="navbar-brand" href="administrativo.php"><span class='glyphicon glyphicon-book'> </span> Biblioteca</a>

		</div>	
		<div id="navbar" class="navbar-collapse collapse">
		
								
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"> </i> Clientes <span class="caret"></span></a>

						<ul class="dropdown-menu">
							<li><a href="administrativo.php?link=2">Listar Clientes</a></li>
							<li><a href="administrativo.php?link=3">Cadastrar Clientes</a></li>
							<!-- <li><a href="administrativo.php?link=10">Pesquisar Usuários</a></li> -->
						</ul>
					</li>
				</ul>

                <ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"> </i> Agendamentos <span class="caret"></span></a>

						<ul class="dropdown-menu">
							<li><a href="administrativo.php?link=2">Listar Agendamentos</a></li>
							<li><a href="administrativo.php?link=3">Cadastrar Agendamentos</a></li>
							<!-- <li><a href="administrativo.php?link=10">Pesquisar Usuários</a></li> -->
						</ul>
					</li>
				</ul>
						
			
			<ul class="nav navbar-nav  navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!-- <i class="fa fa-cog"> </i>  -->
						
						18 - Isaque Veras						<span class="caret"></span></a>

					<ul class="dropdown-menu">
												<li><a href="administrativo.php?link=18"><i class="fa fa-user"> </i> Perfil</a></li>
						<li class="divider"></li>
						<li><a href="sair.php"><i class="fa fa-power-off"> </i> Sair</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			    <li></li>
			</ul>
			
		</div>
	</div>
</nav>
<div class="container theme-showcase" role="main">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="administrativo.php">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"> </i> Lista de Clientes </li>
	  </ol>
	</nav>

		<div class="row">

	<div class="col-12">
   	<!-- Formulario de Pesquisa -->
    <form method="GET" action="pesquisa_usuarios.php">
      <div class="col-md-12">
       	<div class="form-group">
          <!-- campo de Pesquisa -->
          <div class="input-group">
						<input required type="text" name="pesquisa" class="form-control" id="pesquisa" placeholder="Pesquisar Clientes">
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
							<th>#</th>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Matrícula</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr><td>1</td><td>Ismael Veras de Oliveira</td>
                        <td>Ismael@gmail.com</td>
                        <td>89546821</td>
                        															<td>
									<a href="administrativo.php?link=5&id=20">
									<button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="bottom" title="Exibir" data-original-title="Exibir"><i class="fa fa-list-ul"> </i> Exibir</button></a>

									<a href="administrativo.php?link=4&id=20">
									<button type="button" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar" data-original-title="Editar"><i class="fa fa-edit"> </i> Editar</button></a>

									<a href='#' data-toggle="modal" data-target="#apagar_usu-20">
									<button type='button' class='btn btn-xs btn-danger' data-toggle="tooltip" data-placement="bottom" title="Excluir" data-original-title="Excluir"><i class="icon fa fa-trash"> </i> Excluir</button></a>

									<a href="print_usuario.php?id=20">
									<button type="button" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="bottom" title="PDF" data-original-title="PDF"><i class="fa fa-file-pdf"> </i> PDF</button></a>

											<div class="modal fade" id="apagar_usu-20" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"> </i> ATENÇÃO</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-body">
														<h5>Você deseja realmente apagar o Cliente <strong>Isaque Veras de Oliveira</strong>?</h5>
													</div>

													<div class="modal-footer">
														<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Não </button>
														<a href="processa/proc_apagar_usuario.php?id=20" class="btn btn-danger"><i class="fa fa-check"></i> Sim</a>
													</div>

												</div>
											</div>
										</div>

								</td>

														
						</tr>
                        
                        <tr><td>2</td><td>Isaque Veras de Oliveira</td>
                        <td>Isaque@gmail.com</td>
                        <td>2979992</td>
                        															<td>
									<a href="administrativo.php?link=5&id=20">
									<button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="bottom" title="Exibir" data-original-title="Exibir"><i class="fa fa-list-ul"> </i> Exibir</button></a>

									<a href="administrativo.php?link=4&id=20">
									<button type="button" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar" data-original-title="Editar"><i class="fa fa-edit"> </i> Editar</button></a>

									<a href='#' data-toggle="modal" data-target="#apagar_usu-20">
									<button type='button' class='btn btn-xs btn-danger' data-toggle="tooltip" data-placement="bottom" title="Excluir" data-original-title="Excluir"><i class="icon fa fa-trash"> </i> Excluir</button></a>

									<a href="print_usuario.php?id=20">
									<button type="button" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="bottom" title="PDF" data-original-title="PDF"><i class="fa fa-file-pdf"> </i> PDF</button></a>

											<div class="modal fade" id="apagar_usu-20" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"> </i> ATENÇÃO</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-body">
														<h5>Você deseja realmente apagar o usúario <strong>Isaque Veras de Oliveira</strong>?</h5>
													</div>

													<div class="modal-footer">
														<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Não </button>
														<a href="processa/proc_apagar_usuario.php?id=20" class="btn btn-danger"><i class="fa fa-check"></i> Sim</a>
													</div>

												</div>
											</div>
										</div>

								</td>

														
						</tr>

                    </tbody>
				</table>
			</div>

		</div>
	</div>
</div>	<!-- JavaScript files-->
	<script src="js/jquery.min.js"></script>
	<script> window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="js/docs.min.js"></script>
</body>
</html>