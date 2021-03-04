
<?php
	session_start();
	include_once("seguranca.php");
	include_once("conexao.php");
	include ('pdf/pdf/mpdf.php');
	$id = $_GET['id'];
	//Executa consulta
	$result = mysql_query("SELECT * FROM usuarios WHERE id='$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($result);

	$pagina = 
		"<html>
			<title>Usuario PDF</title>
			<body>
				<h2 align='center'>...::: Usuario :::...</h2>
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
							<b>Usuário:&nbsp;</b>".$resultado['nome']."
						</div>
						</td>
					</tr>
					
					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>E-mail:&nbsp;</b>".$resultado['email']."
						</div>
						</td>
					</tr>
					
					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>Matricula:&nbsp;</b>".$resultado['matricula']."
						</div>
						</td>
					</tr>
					
					<tr>
						<td>
						<div class='col-xs-3 col-sm-1 col-md-1'>
							<b>Nivel de Acesso:&nbsp;</b>".$resultado['nivel_acesso_id']."
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
