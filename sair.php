<?php
	include_once("conexao.php");
 	session_start();

 	if ($_SESSION['admNivelAcesso'] == 1) {
		$matricula = $_SESSION['admMatricula'];
		$senha     = $_SESSION['admSenha'];
	}else{
		$matricula = $_SESSION['usuarioMatricula'];
		$senha     = $_SESSION['usuarioSenha'];
	}

 	$result = mysql_query("SELECT * FROM usuarios WHERE matricula='$matricula' AND senha='$senha' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);

	if ($_SESSION['admNivelAcesso'] == 1) {
		session_destroy();

	 	//Remova todas as informaçoes contidas nas variaveis globais 
	 	unset(
	 		$_SESSION['usuarioId'],
	 		$_SESSION['usuarioNome'],
	 		$_SESSION['usuarioNivelAcesso'],
	 		$_SESSION['usuarioLogin'],
	 		$_SESSION['usuarioEmail'],
	 		$_SESSION['usuarioMatricula'],
	 		$_SESSION['usuarioSenha']
	 	);
		$id = $resultado['id'];
		$query = mysql_query("UPDATE usuarios SET status = '0' WHERE id='$id' ");
	 	
	 	// Redireciona o usuario para a pagina de Login
	 	header("Location: login.php");
	 	
	}else{
		session_destroy();
 
		//Remova todas as informações contidas nas variáveis globais
		unset(
			$_SESSION['admId'], 			
			$_SESSION['admNome'], 		
			$_SESSION['admNivelAcesso'], 
			$_SESSION['admLogin'], 
			$_SESSION['admEmail'],
	 		$_SESSION['admMatricula'],		
			$_SESSION['admSenha']
		);
		$id = $resultado['id'];
		$query = mysql_query("UPDATE usuarios SET status = '0' WHERE id='$id' ");

		//Redireciona o usuário para a página de login
		header("Location: login.php");

	}

 ?>