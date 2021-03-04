<?php
	session_start();
	include_once("conexao.php");
	include_once("seguranca_adm.php");
?>
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
	<?php  
		include_once("menu.php");

		$link = $_GET['link'];

		$pag[1] = "bem_vindo.php";
		$pag[2] = "listar_usuarios.php";
		$pag[3] = "cad_usuario.php";
		$pag[4] = "editar_usuario.php";
		$pag[5] = "visual_usuario.php";
		$pag[6] = "cad_produtos.php";
		$pag[7] = "listar_produtos.php";
		$pag[8] = "visual_produtos.php";
		$pag[9] = "editar_categoria.php";
		$pag[10] = "pesquisar_usu.php";
		$pag[11] = "pesquisar_livro.php";
		$pag[12] = "listar_livros.php";
		$pag[13] = "cad_livro.php";
		$pag[14] = "editar_livro.php";
		$pag[15] = "visual_livro.php";
		$pag[16] = "listar_resevados.php";
		$pag[17] = "pesquisar_reservas.php";
		$pag[18] = "profile_adm.php";
		$pag[19] = "cad_categoria.php";
		$pag[20] = "listar_categoria.php";
		$pag[21] = "print_livro.php";
		$pag[22] = "listar_banner.php";
		$pag[23] = "cadastrar_banner.php";
		$pag[24] = "editar_banner.php";
		$pag[25] = "pesquisa_usuarios.php";
		$pag[26] = "configuracoes.php";

		if(!empty($link)){
			if (file_exists($pag[$link])) {
				include $pag[$link];
			}else{
				include "bem_vindo.php";
			}
		}else{
			include "bem_vindo.php";
		}
	?>
	<!-- JavaScript files-->
	<script src="js/jquery.min.js"></script>
	<script> window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="js/docs.min.js"></script>
</body>
</html>