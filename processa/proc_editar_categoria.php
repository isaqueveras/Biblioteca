<?php
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");
	
	$id   = addslashes($_POST["id"]);
	$nome = addslashes($_POST["nome"]);

	$query = mysql_query("UPDATE categoria_livro SET nome='$nome',modificado=NOW() WHERE id='$id' ");

	if(mysql_affected_rows() != 0):	
		$_SESSION['cor']  = "success";	
		$_SESSION['proc'] = "<i class='fas fa-bars'> </i> Categoria <b>$nome</b> editado com sucesso.";
		header("Location: ../administrativo.php?link=20");
	else:
		$_SESSION['cor']  = "danger";	
		$_SESSION['proc'] = "<i class='fa fa-bars'> </i> Não foi possivel editar a categoria <b>$nome</b>.";
		header("Location: ../administrativo.php?link=20");
	endif;
?>