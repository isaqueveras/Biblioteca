<?php
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");
	
	$id 				= addslashes($_POST["id"]);
	$nome 				= addslashes($_POST["nome"]);
	$email 				= addslashes($_POST["email"]);
	$matricula 			= addslashes($_POST["matricula"]);
	$senha 				= addslashes($_POST["senha"]);
	$nivel_de_acesso 	= addslashes($_POST["nivel_de_acesso"]);
	$numero			 	= addslashes($_POST["num"]);
	
	$query = mysql_query("UPDATE usuarios SET nome = '$nome',matricula = '$matricula',numero = '$numero', email = '$email', senha = '$senha', nivel_acesso_id = '$nivel_de_acesso', modified = NOW() WHERE id = '$id' ");

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";	
		$_SESSION['proc'] = "<i class='fa fa-users'> </i> Usuario <b>$nome</b> editado com sucesso.";
		header("Location: ../administrativo.php?link=2");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-users'> </i> Não foi possivel editar o Usuario <b>$nome</b>.";
		header("Location: ../administrativo.php?link=2");
	endif;
?>