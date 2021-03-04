<?php
	ob_start();
	if(($_SESSION['admId'] == "") || ($_SESSION['admNome'] == "") || ($_SESSION['admNivelAcesso'] == "") || ($_SESSION['admMatricula'] == "") 
		|| ($_SESSION['admSenha'] == "")){
			unset($_SESSION['admId'], //caso algum campo esteja vázio, destrua todas as variáveis.			
				  $_SESSION['admNome'], 		
				  $_SESSION['admNivelAcesso'], 
		          $_SESSION['admMatricula'], 		
		          $_SESSION['admSenha']);
	//Mensagem de Erro
	$_SESSION['loginErro'] = "Acesso Inválido - Área Restrita à Administradores!";

	//Manda o usuário para a tela de loginErro
	header("Location: index.php");	
}