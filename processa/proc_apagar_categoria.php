<?php  
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");
	$id = $_GET['id'];
	$query = mysql_query("DELETE FROM categoria_livro WHERE id='$id' ");
	
	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fa fa-bars'> </i> Categoria apagado com sucesso.";
		header("Location: ../administrativo.php?link=20");
	else:
		$_SESSION['cor']  = "danger";	
		$_SESSION['proc'] = "<i class='fa fa-bars'> </i> Não foi possivel apagar a categoria.";
		header("Location: ../administrativo.php?link=20");
	endif;
?>