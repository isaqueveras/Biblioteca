<?php
	//Incluir a conexão com banco de dados
	include_once('conexao_busca.php');
	
	//Recuperar o valor da palavra
	$palavra = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$palavra = "SELECT * FROM usuarios WHERE nome LIKE '%$palavra%'";
	$resultado_palavra = mysqli_query($conn, $palavra);
				
	if(mysqli_num_rows($resultado_palavra) <= 0){
		echo "Nenhum usuário encontrado...";
	}else{ ?>
		<div class='theme-showcase' role='main'>
			<div class='row'>
				<div class='col-md-12'>
					<table class='table table-striped'>
						<thead style="background: #e8e8e8; color: #3e3e3e;">
							<tr>
								<th width='100'>Nome</th>
								<th width='100'>E-mail</th>
								<th width="100">Matrícula</th>
								<th width='100'>Nivel de Acesso</th>
						  	</tr>
						</thead>
					</table>
				</div>
			</div>
		</div> 
		
		<?php while($rows = mysqli_fetch_array($resultado_palavra)){

			if ($rows['nivel_acesso_id'] == 1) {
				$nivel = "Administrador";
			}else{
				$nivel = "Usuário";
			} ?>
	
			<div class='theme-showcase' role='main'>
				  <div class='row'>
					<div class='col-md-12'>
					  <table class='table table-striped'>
						<thead>
						  <tr>
							<th width='100'><?php echo $rows['nome']; ?></th>
							<th width='100'><?php echo $rows['email']; ?></th>
							<th width='100'><?php echo $rows['matricula']; ?></th>
							<th width='100'><?php echo $nivel; ?></th>
						  </tr>
						</thead>
					  </table>
					</div>
				   </div>
				</div>
		<?php }
	}
?>