<?php  
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");

	$nome = addslashes($_POST['nome_categoria']);

	$query = mysql_query("INSERT INTO categoria_livro (nome,criado) VALUES ('$nome', NOW() ) ");

	if(mysql_affected_rows() != 0):	
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fas fa-bars'> </i> Categoria <b>$nome</b> cadastrado com sucesso.";
		header("Location: ../administrativo.php?link=19");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-bars'> </i> Não foi possivel cadastrar a categoria <b>$nome</b>.";
		header("Location: ../administrativo.php?link=19");
	endif;
?>