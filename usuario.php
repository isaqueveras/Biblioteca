<?php
	session_start();
	include_once("conexao.php");
	include_once("seguranca_usu.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel do Usuário</title>
    <meta name="description" content="Painel do Usuario - Isaque Veras">
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
<?php  
	include_once("menu.php");

	$link = $_GET['link'];

	$pag[1] = "bem_vindo.php";
	$pag[2] = "listar_usuarios.php";
	$pag[3] = "visual_usuarios.php";
	$pag[4] = "pesquisar_livro.php";
	$pag[5] = "proc_reservar_livros.php";
	$pag[6] = "profile_usu.php";
	$pag[8] = "visual_usuario_02.php";
	$pag[10] = "listar_livros.php";
	$pag[11] = "visual_livro.php";

	if(!empty($link)):
		if (file_exists($pag[$link])):
			include $pag[$link];
		else:
			include "bem_vindo.php";
		endif;
	else:
		include "bem_vindo.php";
	endif;
?>

	<!-- JavaScript files-->
	<script src="js/jquery.min.js"></script>
	<script> window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="js/docs.min.js"></script>
</body>
</html>