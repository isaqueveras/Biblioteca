<?php  
	session_start();
	include_once("../seguranca_adm.php");
    include_once("../conexao.php");

    $id = $_GET['id'];
    $uploaddir = "../imagens/banner/";
    $nome_foto = $_GET['img'];

    // Apagando a imagem da pasta 
    unlink($uploaddir.'/'.$nome_foto);

	$query = mysql_query("DELETE FROM banner WHERE id='$id' ");
	
	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Banner apagado com sucesso!";
		header("Location: ../administrativo.php?link=22");
	else:
		$_SESSION['cor']  = "danger";	
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Não foi possivel apagar o Banner!";
		header("Location: ../administrativo.php?link=22");
	endif;
?>