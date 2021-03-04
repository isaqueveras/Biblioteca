<?php  
	session_start();
	include_once("../conexao.php");

	$nome         = addslashes($_POST['nome_usu']);
	$email        = addslashes($_POST['email_usu']);
	$senha        = addslashes($_POST['senha_usu']);
	$matricula    = addslashes($_POST['mat_usu']);
	$numero		  = addslashes($_POST["num_usu"]);

	$query = mysql_query("INSERT INTO usuarios (nome,color,matricula,email,senha,nivel_acesso_id,status,numero,created) VALUES ('$nome','default','$matricula','$email','$senha','$nivel_acesso','0','$numero', NOW() ) ");

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";	
		$_SESSION['loginErro'] = "<i class='fa fa-users'> </i> Seja bem Vindo(a) <b>$nome</b> você foi cadastrado com sucesso.";
		header("Location: ../index.php");
	else:
		$_SESSION['loginErro'] = "<i class='fa fa-users'> </i> Não foi possivel criar a sua conta,por favor retorna depois.";
		header("Location: ../index.php");
	endif;
?>