<?php
	//Incluir a conexão com banco de dados
	include_once('conexao_busca.php');
	
	//Recuperar o valor da palavra
	$palavra = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$palavra = "SELECT * FROM resevados WHERE matricula LIKE '%$palavra%' LIMIT 1";
	$resultado_palavra = mysqli_query($conn, $palavra);
				
	if(mysqli_num_rows($resultado_palavra) <= 0){
		echo "Nenhum livro resevado encontrado...";
	}else{ ?>
		<div class='theme-showcase' role='main'>
			<div class='row'>
				<div class='col-md-12'>
					<table class='table'>
						<thead style="background: #e8e8e8; color: #3e3e3e;">
							<tr>
								<th width='190'>Nome do Livro</th>
								<th width='100'>Nome do Aluno</th>
								<th width='100'>Matricula</th>
								<th width='50'>Ações</th>
						  	</tr>
						</thead>
			
					<?php while($rows = mysqli_fetch_array($resultado_palavra)){ ?>
				 
						<tbody>
						<tr>
							<th width='190'><?php echo $rows['nome_livro']; ?></th>
							<th width='100'><?php echo $rows['nome_usuario']; ?></th>
							<th width='100'><?php echo $rows['matricula']; ?></th>
							<th width='50'>
										<!-- Botão de Resevar -->
										<a href='processa/proc_devolucao_reservas.php?id_livro=<?php echo $rows['id_livro']; ?>&id_reseva=<?php echo $rows['id']; ?>'>
											<button type='button' class='btn btn-sm btn-primary'><i class="icon fa fa-cart-plus"></i> Devolução </button>
										</a>
							</th>
						 </tr>
						 
						</tbody>

					  </table>
					</div>
				</div>
			</div> <?php }
	}
?>