<?php
	session_start();
	$matricula = addslashes($_POST['matricula']);
	$senha     = addslashes($_POST['senha']);
	include_once("conexao.php");

	$result = mysql_query("SELECT * FROM usuarios WHERE matricula='$matricula' AND senha='$senha' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);

	if (empty($resultado)){ // variável esteja vázia ou não encontrada
		//Mensagem de Erro
		$_SESSION['loginErro'] = "Matrícula ou senha Inválido"; 
		
		//Manda o usuario para a página de login
		header("Location: login.php");

	}else if ($resultado['nivel_acesso_id'] == 1) {
		//Define os valores atribuidos na sessão do usuário
		$_SESSION['admId'] 			= $resultado['id'];
		$_SESSION['admNome'] 		= $resultado['nome'];
		$_SESSION['admNivelAcesso'] = $resultado['nivel_acesso_id'];
		$_SESSION['admLogin'] 		= $resultado['login'];
		$_SESSION['admSenha'] 		= $resultado['senha'];
		$_SESSION['admEmail'] 		= $resultado['email'];
		$_SESSION['admMatricula']   = $resultado['matricula'];
		$_SESSION['admColor']       = $resultado['color'];
		$_SESSION['admNum']         = $resultado['numero'];

		$id = $resultado['id'];
		
		$query = mysql_query("UPDATE usuarios SET status = '1', entrada=NOW() WHERE id='$id' ");

		//Manda o usuario para a página de administrativo
		header("Location: administrativo.php");
	}else {
		//Define os valores atribuidos na sessão do usuário
		$_SESSION['usuarioId'] 			= $resultado['id'];
		$_SESSION['usuarioNome'] 		= $resultado['nome'];
		$_SESSION['usuarioNivelAcesso'] = $resultado['nivel_acesso_id'];
		$_SESSION['usuarioLogin'] 		= $resultado['login'];
		$_SESSION['usuarioEmail'] 		= $resultado['email'];
		$_SESSION['usuarioSenha'] 		= $resultado['senha'];
		$_SESSION['usuarioMatricula'] 	= $resultado['matricula'];
		$_SESSION['usuarioColor'] 	    = $resultado['color'];
		$_SESSION['usuarioNum'] 	    = $resultado['numero'];
		
		$id = $resultado['id'];

		$query = mysql_query("UPDATE usuarios SET status = '1' , entrada=NOW() WHERE id='$id' ");

		//Manda o usuario para a página de usuario
		header("Location: usuario.php");

		
	}
?>