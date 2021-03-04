<?php
	ob_start();
	if(($_SESSION['usuarioId'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioNivelAcesso'] == "") || ($_SESSION['usuarioMatricula'] == "") 
		|| ($_SESSION['usuarioSenha'] == "")){
			unset($_SESSION['usuarioId'], //caso algum campo esteja vázio, destrua todas as variáveis.			
				  $_SESSION['usuarioNome'], 		
				  $_SESSION['usuarioNivelAcesso'], 
		          $_SESSION['usuarioMatricula'], 		
		          $_SESSION['usuarioSenha']);
	//Mensagem de Erro
	$_SESSION['loginErro'] = "Acesso Inválido - Área Restrita à Usuários!";

	//Manda o usuário para a tela de loginErro
	header("Location: index.php");	
}