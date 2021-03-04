<?php  
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");

	$titulo = mysql_escape_string(addslashes($_POST['titulo']));
	$texto  = mysql_escape_string(addslashes($_POST['texto']));
	$img    = mysql_escape_string(addslashes($_POST['info']));
    $name_img = $_FILES['info']['name'];

    $uploaddir = "../imagens/banner/";
    $uploadfile = $uploaddir . basename($_FILES['info']['name']);

    move_uploaded_file($_FILES['info']['tmp_name'], $uploadfile);

	// Data Atual
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Fortaleza');
	$data_atual = strftime('%d/%m/%y');	

	$query = mysql_query("INSERT INTO banner (titulo,texto,img,criado) VALUES ('$titulo','$texto','$name_img','$data_atual')");

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";	
		$_SESSION['proc'] = "<i class='fa fa-images'> </i> MENSAGEM: <br> Banner cadastrado com sucesso!";
		header("Location: ../administrativo.php?link=22");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-images'> </i> MENSAGEM: <br Não foi possivel cadastrar o Banner!";
		header("Location: ../administrativo.php?link=22");
	endif;
?>