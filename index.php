<?php  
  include_once("conexao_busca.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Biblioteca da EEEP Prof Plácido Aderaldo Castelo">
    <meta name="author" content="Isaque Veras">
    <title>Biblioteca da EEEP Prof Plácido Aderaldo Castelo</title>
    <!-- Bootstrap core CSS -->
    <link href="css/css-index.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="imagens/favicon.png">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light" style="border-bottom: solid 3px #ddd;">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="imagens/logo.png" style="width:90px;" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    
                </ul>
                <ul class="navbar-nav mr-auts">

                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>

                </ul>
            </div>
        </div>
      </nav>
    </header>

<main role="main">

<div class="espaco-topo">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicadores -->
				<ol class="carousel-indicators">
					<?php
						$controle_ativo = 2;		
						$controle_num_slide = 1;
						$result_carousel = "SELECT * FROM banner";
						$resultado_carousel = mysqli_query($conn, $result_carousel);
						while($row_carousel = mysqli_fetch_assoc($resultado_carousel)){ 
							if($controle_ativo == 2){ ?>
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li><?php
								$controle_ativo = 1;
							}else{ ?>
								<li data-target="#carousel-example-generic" data-slide-to="<?php echo $controle_num_slide; ?>"></li><?php
								$controle_num_slide++;
							}
						}
					?>						
				</ol>

				<!-- Slides -->
				<div class="carousel-inner img-fluid">
					<?php
						$controle_ativo = 2;						
						$result_carousel = "SELECT * FROM banner ORDER BY id DESC";
						$resultado_carousel = mysqli_query($conn, $result_carousel);
						while($row_carousel = mysqli_fetch_assoc($resultado_carousel)){ 
							if($controle_ativo == 2){ ?>
								<div class="carousel-item active">
									<img src="imagens/banner/<?php echo $row_carousel['img']; ?>" alt="<?php echo $row_carousel['titulo']; ?>" class="img-fluid">
                  <div class="container">
                    <div class="carousel-caption text-left">
                      <h1><?php echo $row_carousel['titulo']; ?></h1>
                      <p><?php echo $row_carousel['texto']; ?></p>
                    </div>
                  </div>

								</div><?php
								$controle_ativo = 1;
							}else{ ?>
								<div class="carousel-item">
									<img src="imagens/banner/<?php echo $row_carousel['img']; ?>" alt="<?php echo $row_carousel['titulo']; ?>" class="img-fluid">
                  <div class="container">
                    <div class="carousel-caption text-left">
                      <h1><?php echo $row_carousel['titulo']; ?></h1>
                      <p><?php echo $row_carousel['texto']; ?></p>
                    </div>
                  </div>
              	</div> <?php
							}
						}
					?>					
				</div><hr>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
        </a>
        
			</div>
		</div>


  <div class="container marketing">

    <div class="row">
    
      <!-- Serviços 1 -->
      <div class="col-md-3 col-xs-6 text-center">
        <span class="fa-stack fa-4x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
        </span>
        <h2 class="text-primary">Calendário Letivo</h2>
        <p>Todos os alunos poderão visualizar o calendário com os eventos letivos da sua escola.</p>
      </div>

       <!-- Serviços 1 -->
       <div class="col-md-3 col-xs-6 text-center">
        <span class="fa-stack fa-4x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
        </span>
        <h2 class="text-primary">Calendário Letivo</h2>
        <p>Todos os alunos poderão visualizar o calendário com os eventos letivos da sua escola.</p>
      </div>

       <!-- Serviços 1 -->
       <div class="col-md-3 col-xs-6 text-center">
        <span class="fa-stack fa-4x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
        </span>
        <h2 class="text-primary">Calendário Letivo</h2>
        <p>Todos os alunos poderão visualizar o calendário com os eventos letivos da sua escola.</p>
      </div>

       <!-- Serviços 1 -->
       <div class="col-md-3 col-xs-6 text-center">
        <span class="fa-stack fa-4x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
        </span>
        <h2 class="text-primary">Calendário Letivo</h2>
        <p>Todos os alunos poderão visualizar o calendário com os eventos letivos da sua escola.</p>
      </div>
      
    </div><br><hr>

  </div>


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">&#30; Inicio</a></p>
    <p> Desenvolvido por <a href="https://instagram.com/iv_isaque">Isaque Veras</a> | &copy; Todos os direitos reservado.</p>
  </footer>
</main>
<script src="js/jquery-3.3.1.slim.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
      <script src="js/bootstrap.bundle.min.js"></script>
      </body>
</html>
