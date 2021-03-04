<?php  
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");
	$id = $_GET['id'];
	$query = mysql_query("DELETE FROM livros WHERE id='$id' ");
	
	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> livro apagado com sucesso.";
		header("Location: ../administrativo.php?link=12");
	else:
		$_SESSION['cor']  = "danger";	
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Não foi possivel apagar o livro.";
		header("Location: ../administrativo.php?link=12");
	endif;
?>