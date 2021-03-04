<?php  
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");
	
	$id_livro  = $_GET['id_livro'];
	$id_reseva = $_GET['id_reseva'];

	$resultado = mysql_query("SELECT * FROM livros WHERE id='$id_livro' LIMIT 1");
	$linhas = mysql_fetch_assoc($resultado);

	$calc = ($linhas['quantidade'] +1);
	
	$calc = mysql_query("UPDATE livros SET quantidade='$calc',modificado=NOW() WHERE id='$id_livro' ");
	$query = mysql_query("DELETE FROM resevados WHERE id='$id_reseva'");
	if(mysql_affected_rows() != 0):	
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Devolução efetuada com sucesso.";
		header("Location: ../administrativo.php?link=16");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Não foi possivel fazer a defolução do Livro.";
		header("Location: ../administrativo.php?link=16");
	endif;
?>