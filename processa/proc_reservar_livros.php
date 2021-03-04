<?php
	session_start();
	include_once("../seguranca_usu.php");
	include_once("../conexao.php");

	$id = $_GET['id'];
	$id_user = $_SESSION['usuarioId'];
	$resultado = mysql_query("SELECT * FROM livros WHERE id='$id' LIMIT 1");
	$linhas = mysql_fetch_assoc($resultado);

	$usuario = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE id='$id_user' LIMIT 1"));

	$calc = ($linhas['quantidade'] -1);
	if ($calc < 1) {
		// corrigindo o bug do 0
		$calc = 0;
	}

	$nome_livro    = $linhas['nome'];
	$nome_usuario  = $_SESSION['usuarioNome'];
	$matricula     = $_SESSION['usuarioMatricula'];
	$email_usuario = $_SESSION['usuarioEmail'];
	$quantidade    = $linhas['quantidade'];

	$qtd_pego = ($linhas['qtd_pego'] + 1);
	$qtd_pego_user = ($usuario['qtd_pego'] + 1);

	if ($linhas['quantidade'] >= 1) {
		$query = mysql_query("INSERT INTO resevados (nome_livro,nome_usuario,matricula,email_usuario,id_livro,quant_livros,criado,status) VALUES ('$nome_livro','$nome_usuario','$matricula','$email_usuario','$id','$quantidade','$data_atual','1' )");
		$calcu = mysql_query("UPDATE livros SET quantidade='$calc',qtd_pego='{$qtd_pego}',modificado=NOW() WHERE id='$id' ");
		$usuar = mysql_query("UPDATE usuarios SET qtd_pego='{$qtd_pego_user}',modified=NOW() WHERE id='$id_user' ");
	}

	if(mysql_affected_rows() != 0):
		$_SESSION['cor']  = "success";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> O Livro <b>{$linhas['nome']}</b> foi reservado com sucesso.<br>Por Favor se direciona a Biblioteca e informe a sua matricula para retirar o livro.";
		header("Location: ../usuario.php?link=10");
	else:
		$_SESSION['cor']  = "danger";
		$_SESSION['proc'] = "<i class='fa fa-book'> </i> Não foi possivel reservar o Livro <b>{$linhas['nome']}</b>.";
		header("Location: ../usuario.php?link=10");
	endif;
?>