<?php
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");
	
	$id = $_GET['id'];
	$query = mysql_query("UPDATE resevados SET status='2' WHERE id='$id' ");

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Livro <b>$nome</b> Autorizado por {$_SESSION['admNome']} com sucesso.";
		header("Location: ../administrativo.php?link=16");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Não foi possivel autorizar o Livro <b>$nome</b>.";
		header("Location: ../administrativo.php?link=16");
	endif;
?>