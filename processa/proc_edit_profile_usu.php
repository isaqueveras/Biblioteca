<?php
	session_start();
	include_once("../conexao.php");
	
	$id 			= addslashes($_POST["id"]);
	$nome 			= addslashes($_POST["nome"]);
	$email 			= addslashes($_POST["email"]);
	$matricula 		= addslashes($_POST["matricula"]);
	$senha 		    = addslashes($_POST["senha"]);
	$cor_template	= addslashes($_POST["cor_template"]);

	$query = mysql_query("UPDATE usuarios SET nome='$nome',email='$email',color='$cor_template',senha='$senha',modified=NOW() WHERE id='$id' ");

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";	
		$_SESSION['proc'] = "<i class='fa fa-users'> </i> Perfil <b>$nome</b> editado com sucesso.";
		header("Location: ../usuario.php?link=6");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-users'> </i> Não foi possivel editar o Perfil <b>$nome</b>.";
		header("Location: ../usuario.php?link=6");
	endif;
?>