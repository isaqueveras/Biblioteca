<?php  
	// Iniciando a sessão
	session_start();
	// Incluindo o arquivo de segurança
	include_once("../seguranca_adm.php");
	// Incluindo o arquivo de conexão com o banco de dados
	include_once("../conexao.php");

	$id = $_GET['id'];
	// Variaveis do Formulario
	$titulo = mysql_escape_string(addslashes($_POST['titulo']));
	$texto  = mysql_escape_string(addslashes($_POST['texto']));
	// Variavel do caminho da imagem
    $uploaddir = "../imagens/banner/";
	$uploadfile = $uploaddir . basename($_FILES['info']['name']);
	
	// Estrutura de descição para saber se a imagem é novo ou é a mesma
	if (!empty($_FILES['info']['name'])) {
		// Variavel da imagem nova
		$img = $_FILES['info']['name'];
		// Movendo a imagem nova para a pasta
		move_uploaded_file($_FILES['info']['tmp_name'], $uploadfile);
		// Apagando a imagem antiga da pasta 
		unlink($uploaddir.'/'.$_POST['img_velha']);
	} else {
		// Variavel da imagem
		$img = $_POST['img_velha'];
		// Movendo a imagem nova para a pasta
		move_uploaded_file($_FILES['info']['tmp_name'], $uploadfile);
	}

    // Data Atual
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Fortaleza');
    $data_atual = strftime('%d/%m/%y');	
    
    // // Query do MySQL
	$query = mysql_query("UPDATE banner SET titulo='$titulo',texto='$texto',img='$img',modificado='$data_atual' WHERE id='$id' ");

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";	
		$_SESSION['proc'] = "<i class='fa fa-images'> </i> MENSAGEM: <br> Banner editado com sucesso!";
		header("Location: ../administrativo.php?link=22");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-images'> </i> MENSAGEM: <br> Não foi possivel editar o Banner!";
		header("Location: ../administrativo.php?link=22");
	endif;
?>