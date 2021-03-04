<?php
	include_once("conexao.php");
	$id = $_SESSION['admId'];
	$resultado = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE id='$id' "));
?>

<div class="container theme-showcase" role="main">

   <div class="row">

		<ul class="nav nav-tabs" style="padding-left:10px;">
			<li class="active"><a href="#Perfil" data-toggle="tab">Perfil</a></li>
			<li><a href="#Editar" data-toggle="tab">Editar</a></li>
		</ul>
		
		<div class="tab-content">
			<!-- Dados do Usuario -->
			<div class="tab-pane fade in active" id="Perfil"> <br>

				<!-- left column -->
				<div class="col-md-3">
					<ul class="list-group">
						<!-- Image do Usuário -->
						<li class="list-group-item" >
							<img src="imagens/logo.png" class="img-responsive">
						</li>
						<li class="list-group-item" style="border-left:7px solid #a2a2a2;">
							<!-- <span class="badge">14</span> -->
							<b style="font-size:20px;"><?php echo ucwords($_SESSION['admNome']); ?></b><p style="margin-bottom:0px"><?php echo ucwords($resultado['email']); ?></b>
						</li>
						<!-- <li class="list-group-item items">
							<span class="badge items-badge"><?php echo number_format($quantidade_produtos,0,",", "."); ?></span>
							Produtos Vendidos
						</li>
						<li class="list-group-item items">
							<span class="badge items-badge"><?php echo number_format($quantidade_clientes,0,",", "."); ?></span>
							Clientes Cadastrado
						</li> -->
					</ul>
				</div>
      
				<!-- edit form column -->
				<div class="col-md-9">

					<?php 
						if(isset($_SESSION['cor'])):
							$cor = $_SESSION['cor'];
							unset ($_SESSION['cor']);
						endif;

						// Se existir a sessão aparecerar um alert
						if(isset($_SESSION['proc'])): ?>
							<div class="alert alert-<?php echo $cor; ?>" role="alert">
									<?php echo $_SESSION['proc']; ?>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							</div>  
							<?php unset ($_SESSION['proc']);
						endif;

						// Identifca se o usuario é Administrador ou Usuario
						if($resultado['nivel_acesso_id'] == 1):
							$nivel_acesso_id = "Administrador";
						elseif($resultado['nivel_acesso_id'] == 0):
							$nivel_acesso_id = "Usuario";
						endif;

						if ($resultado['status'] == 1) {
							$status = '<i class="fa fa-bullseye" style="color: #20c997;"> </i> Online</span>';
						}else{
							$status = '<i class="fa fa-bullseye" style="color: #ff6b6b;"> </i> Offline</span>';
						}
					?>

					<div class="panel panel-default">
						<div class="panel-heading">Dados do Perfil</div>
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Nome</th>
											<th>E-mail</th>
											<th>Matrícula</th>
											<th>Nivel</th>
											<th>Status</th>
											<th>Entrou</th>
											<th>Criado</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $resultado['nome']; ?></td>
											<td><?php echo $resultado['email']; ?></td>
											<td><?php echo $resultado['matricula']; ?></td>
											<td><?php echo $nivel_acesso_id; ?></td>
											<td><?php echo $status ?></td>
											<td><?php echo $resultado['entrada']; ?></td>
											<td><?php echo $resultado['created']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

				</div>

			</div>
 
			<div class="tab-pane fade" id="Editar"><br>
				
				<!-- left column -->
				<div class="col-md-3">
					
					<ul class="list-group">
						<!-- Image do Usuário -->
						<li class="list-group-item" >
							<img src="imagens/logo.png" class="img-responsive">
						</li>

						<li class="list-group-item" style="border-left:7px solid #a2a2a2;">
							<!-- <span class="badge">14</span> -->
							<b style="font-size:20px;"><?php echo ucwords($_SESSION['admNome']); ?></b><p style="margin-bottom:0px"><?php echo ucwords($resultado['email']); ?></b>
						</li>
						<!-- <li class="list-group-item items">
							<span class="badge items-badge"><?php echo $quantidade_produtos; ?></span>
							Produtos Vendidos
						</li>
						<li class="list-group-item items">
							<span class="badge items-badge"><?php echo $quantidade_clientes; ?></span>
							Clientes Cadastrado
						</li> -->
					</ul>

				</div>
      
				<!-- edit form column -->
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading">Editar Perfil</div>
							<div class="panel-body">

								<form class="form" method="POST" action="processa/editar_perfil.php?id=<?php echo $linhas['id']; ?>">
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="Nome">Nome</label>
											<input type="text" class="form-control" id="Nome" placeholder="Nome" name="nome" value="<?php echo $linhas['nome']; ?>" required>
										</div>
										<div class="form-group col-md-4">
											<label for="Senha">Senha Existente</label>
											<input type="password" class="form-control" id="Senha" placeholder="Senha" name="senha_existente" required>
										</div>
										<div class="form-group col-md-4">
											<label for="Nova Senha">Nova Senha</label>
											<input type="password" class="form-control" id="Nova Senha" placeholder="Nova Senha" name="nova_senha" required>
										</div>
										<div class="form-group col-md-12">
											<label for="E-mail">E-mail</label>
											<input type="email" class="form-control" id="E-mail" placeholder="E-mail" name="email" value="<?php echo $linhas['email']; ?>" required>
										</div>
									</div>	

									<div class="form-row">
										<div class="col-md-12">
											<button type="submit" class="btn btn-default"><span class='glyphicon glyphicon-edit'></span>  Editar Perfil</button>
										</div>
									</div>

								</form>

							</div>
						</div>
					</div>
				</div><!-- Fim panel -->
			
			</div>			

		</div>
	

    </div>

</div>

<!-- JS -->
<script>
    var areaChartValues = [{
		y: <?php echo $sq_01; ?>,
		exploded: true,
		indexLabel: "Jan",
		color: "#ddd"
	}, {
		y: <?php echo $sq_02; ?>,
		indexLabel: "Fev",
		color: "#ddd"
	}, {
		y: <?php echo $sq_03; ?>,
		indexLabel: "Mar",
		color: " #ddd"
	}, {
		y: <?php echo $sq_04; ?>,
		indexLabel: "Abr",
		color: "#ddd"
	}, {
		y: <?php echo $sq_05; ?>,
		indexLabel: "Mai",
		color: "#ddd"
	}, {
		y: <?php echo $sq_06; ?>,
		indexLabel: "Jun",
		color: "#ddd"
	}, {
		y: <?php echo $sq_07; ?>,
		indexLabel: "Jul",
		color: "#ddd"
	}, {
		y: <?php echo $sq_08; ?>,
		indexLabel: "Ago",
		color: "#ddd"
	}, {
		y: <?php echo $sq_09; ?>,
		indexLabel: "Set",
		color: "#ddd"
	}, {
		y: <?php echo $sq_10; ?>,
		indexLabel: "Out",
		color: "#ddd"
	}, {
		y: <?php echo $sq_11; ?>,
		indexLabel: "Nov",
		color: "#ddd"
	}, {
		y: <?php echo $sq_12; ?>,
		indexLabel: "Dez",
		color: "#ddd"
	}];

	renderAreaChart(areaChartValues);

	function renderAreaChart(values) {

	var chart = new CanvasJS.Chart("areaChart", {
		backgroundColor: "white",
		colorSet: "colorSet1",
		title:{
			text: "Produtos Vendidos/Mês",
			fontFamily:"Verdana",
			fontSize:20,
			fontWeight: "normal",
		},
		animationEnabled: true,
		data: [{
			indexLabelFontSize: 15,
			indexLabelFontFamily: "Monospace",
			indexLabelFontColor: "black",
			indexLabelLineColor: "black",
			indexLabelPlacement: "outside",
			type: "area",
			showInLegend: false,
			dataPoints: values
		}]
	});
	chart.render();
	}
</script>