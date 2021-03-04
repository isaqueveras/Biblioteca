<?php
	session_start();
	include_once("conexao.php");
	include_once("seguranca_adm.php");
	include ('pdf/pdf/mpdf.php');
	$id = $_GET['id'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM livros WHERE id = '$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);

	$pagina = 
		"<html>
			<body>
				<h2 align='center'>...::: Livro :::...</h2>
				<hr>
				<table class='table table-striped'>
				<tbody>
					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>ID:&nbsp;</b>".$resultado['id']."
						</div>
						</td>
					</tr>
					
					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>Livro:&nbsp;</b>".$resultado['nome']."
						</div>
						</td>
					</tr>
					
					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>Autor:&nbsp;</b>".$resultado['autor']."
						</div>
						</td>
					</tr>
					
					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>Categoria:&nbsp;</b>".$resultado['categoria']."
						</div>
						</td>
					</tr>
					
					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>Quantidade:&nbsp;</b>".$resultado['quantidade']."
						</div>
						</td>
					</tr>

					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>Descrição:&nbsp;</b>".$resultado['descricao']."
						</div>
						</td>
					</tr>

				</tbody>
			</table>
			</body>
		</html>
		";

$arquivo = "Livro.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servidor
// D - Salva o arquivo no computador do usuário
?>
