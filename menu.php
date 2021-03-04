<?php
	// Usuarios Online
    $aa = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) AS `count` FROM `resevados` WHERE status='1'"));
	$alert_agen = $aa['count'];
	if ($alert_agen <= 0) {
		$alert_agendados = "0";
	}else if($alert_agen < 10) {
		$alert_agendados = "0".$alert_agen;
	}else{
		$alert_agendados = $alert_agen;
	}
?>
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
			<?php 
				if ($_SESSION['admNivelAcesso'] == 1){
					$link = "administrativo.php";
				}else{
					$link = "usuario.php";
				}
			?>
			<a class="navbar-brand" href="<?php echo $link; ?>"><span class='glyphicon glyphicon-book'> </span> Biblioteca</a>

		</div>	
		<div id="navbar" class="navbar-collapse collapse">
		
			<?php if ($_SESSION['admNivelAcesso'] == 1) { ?>
					
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"> </i> Usuários <span class="caret"></span></a>

						<ul class="dropdown-menu">
							<li><a href="administrativo.php?link=2">Listar Usuários</a></li>
							<li><a href="administrativo.php?link=3">Cadastrar Usuários</a></li>
							<!-- <li><a href="administrativo.php?link=10">Pesquisar Usuários</a></li> -->
						</ul>
					</li>
				</ul>
						
			<?php } ?>

			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"> </i> Livros <span class="caret"></span></a>

					<ul class="dropdown-menu">
						<?php  
							if ($_SESSION['admNivelAcesso'] == 1) {
								echo '
									<li><a href="administrativo.php?link=12">Listar Livros</a></li>
									<li><a href="administrativo.php?link=13">Cadastrar Livro</a></li>
									<li><a href="administrativo.php?link=11">Pesquisar Livros</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="administrativo.php?link=20">Listar categorias</a></li>
									<li><a href="administrativo.php?link=19">Cadastrar categoria</a></li>
								';
							}else{
								echo '<li><a href="usuario.php?link=10">Listar Livros</a></li>';
								echo '<li><a href="usuario.php?link=4">Pesquisar Livros</a></li>';
							}
						?>
					</ul>


				</li>
			</ul>

			<?php if ($_SESSION['admNivelAcesso'] == 1) { ?>
					
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge"><?php echo $alert_agendados; ?></span> Agendados <span class="caret"></span> </a>

							<ul class="dropdown-menu">
								<li><a href="administrativo.php?link=16">Listar Agendados</a></li>
								<!-- <li><a href="administrativo.php?link=17">Pesquisar </a></li> -->
							</ul>
						</li>
					</ul>
						
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-images"> </i> Banners <span class="caret"></span></a>

							<ul class="dropdown-menu">
								<li><a href="administrativo.php?link=22">Listar Banner</a></li>
								<li><a href="administrativo.php?link=23">Cadastrar Banner</a></li>
							</ul>
						</li>
					</ul>

				<?php } ?>

			<ul class="nav navbar-nav  navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!-- <i class="fa fa-cog"> </i>  -->
						
						<?php 
				        	if ($_SESSION['admNivelAcesso'] == 1) {
				        		print $_SESSION['admNum'] ." - ". $_SESSION['admNome'];
				        	}else{
				        		print $_SESSION['usuarioNum'] ." - ". $_SESSION['usuarioNome'];
				        	}
				        ?>
						<span class="caret"></span></a>

					<ul class="dropdown-menu">
						<?php  
							if ($_SESSION['admNivelAcesso'] == 1) {
								$profile = "administrativo.php?link=18";
							}else{
								$profile = "usuario.php?link=6";
							}
						?>
						<li><a href="<?php echo $profile; ?>"><i class="fa fa-user"> </i> Perfil</a></li>
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