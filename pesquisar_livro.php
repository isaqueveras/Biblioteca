<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/busca_livro.js"></script>
		<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	</head>
	<body>
		<div class="container theme-showcase" role="main">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="">Inicio</a></li>
				    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-book"> </i> Pesquisar Livros</li>
				  </ol>
				</nav>

				<form method="POST" id="form-pesquisa" action="">
					<div class="form-group">
						<input autofocus type="text" name="pesquisa" class="form-control" id="pesquisa" placeholder="Pesquisa pelo o nome do Livro">
					</div>
				</form>

			<div class="resultado"> </div>
		</div>
			
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		 <!-- JavaScript files-->
	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/ie10-viewport-bug-workaround.js"></script>
	    <script src="js/ie-emulation-modes-warning.js"></script>
	</body>
</html>