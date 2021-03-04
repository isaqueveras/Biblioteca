<?php  
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");

	$nome         = addslashes($_POST['nome']);
	$email        = addslashes($_POST['email']);
	$usuario      = addslashes($_POST['usuario']);
	$senha        = addslashes($_POST['senha']);
	$matricula    = addslashes($_POST['matricula']);
	$nivel_acesso = addslashes($_POST['nivel_de_acesso']);
	$numero		  = addslashes($_POST["num"]);

	$query = mysql_query("INSERT INTO usuarios (nome,color,matricula,email,senha,nivel_acesso_id,status,numero,created) VALUES ('$nome','default','$matricula','$email','$senha','$nivel_acesso','0','$numero', NOW() ) ");

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";	
		$_SESSION['proc'] = "<i class='fa fa-users'> </i> Usuario <b>$nome</b> cadastrado com sucesso.";
		header("Location: ../administrativo.php?link=2");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-users'> </i> Não foi possivel cadastrar o Usuario <b>$nome</b>.";
		header("Location: ../administrativo.php?link=2");
	endif;
?>