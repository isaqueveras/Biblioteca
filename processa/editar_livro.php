<?php
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");
	
	$id          = addslashes($_GET['id']);
	$nome        = addslashes($_POST['nome']);
	$categoria   = addslashes($_POST['categoria']);
	$quantidade  = addslashes($_POST['quantidade']);
	$autor       = addslashes($_POST['autor']);
	$descricao   = addslashes($_POST['descricao']);

	// Data Atual
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Fortaleza');
    $data_atual = strftime('%d/%m/%y');	

	$query = mysql_query("UPDATE livros SET nome='$nome',categoria='$categoria',autor='$autor',quantidade='$quantidade',descricao='$descricao',modificado='$data_atual' WHERE id='$id' ");

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Livro <b>$nome</b> editado com sucesso.";
		header("Location: ../administrativo.php?link=12");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Não foi possivel editar o Livro <b>$nome</b>.";
		header("Location: ../administrativo.php?link=12");
	endif;
?>