<?php  
	session_start();
	include_once("../seguranca_adm.php");
	include_once("../conexao.php");

	$nome        = mysql_escape_string(addslashes($_POST['livro']));
	$categoria   = mysql_escape_string(addslashes($_POST['categoria']));
	$quantidade  = mysql_escape_string(addslashes($_POST['quantidade']));
	$autor       = mysql_escape_string(addslashes($_POST['autor']));
	$desc        = mysql_escape_string(addslashes($_POST['descricao']));

	$img = mysql_escape_string(addslashes($_POST['info']));
    $name_img = $_FILES['info']['name'];

    $uploaddir = "../imagens/livros/";
    $uploadfile = $uploaddir . basename($_FILES['info']['name']);
	// Movendo a imagem para a pasta
    move_uploaded_file($_FILES['info']['tmp_name'], $uploadfile);
	// Data Atual
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Fortaleza');
	$data_atual = strftime('%d/%m/%y');	

	$query = mysql_query("INSERT INTO livros (nome,autor,categoria,qtd_pego,img,quantidade,descricao,criado) VALUES ('$nome','$autor','$categoria','0','$name_img','$quantidade','$desc','$data_atual')");

	if(mysql_affected_rows() != 0):	
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fas fa-book'> </i> O livro <b>{$nome}</b> foi cadastrado com sucesso.";
		header("Location: ../administrativo.php?link=12");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Não foi possivel cadastrar o livro <b>{$nome}</b>.";
		header("Location: ../administrativo.php?link=12");
	endif;
?>