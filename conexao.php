<?php 
	$conectar = mysql_connect("localhost","root","") or die ("Erro na conexão");
	mysql_select_db("biblioteca") or die ("Base não encontrado!");
?>