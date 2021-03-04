<?php
	//Incluir a conexão com banco de dados
	include_once('conexao_busca.php');
	
	//Recuperar o valor da palavra
	$palavra = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$palavra = "SELECT * FROM livros WHERE nome LIKE '%$palavra%' LIMIT 15";
	$resultado_palavra = mysqli_query($conn, $palavra);
				
	if(mysqli_num_rows($resultado_palavra) <= 0){
		echo "Nenhum livro encontrado...";
	}else{ ?>
		<div class='theme-showcase' role='main'>
			<div class='row'>
				<div class='col-md-12'>
					<table class='table'>
						<thead style="background: #e8e8e8; color: #3e3e3e;">
							<tr>
								<th width='100'>Nome</th>
								<th width='100'>Autor</th>
								<th width='100'>Categoria</th>
								<th width='100'>Ações</th>
						  	</tr>
						</thead>
					</table>
				</div>
			</div>
		</div> 
			
					<?php while($rows = mysqli_fetch_array($resultado_palavra)){ ?>
				 <div class='theme-showcase' role='main'>
				  <div class='row'>
					<div class='col-md-12'>
					  <table class='table table-striped'>
						<tbody>
						  <tr>
							<th width='100'><?php echo $rows['nome']; ?></th>
							<th width='100'><?php echo $rows['autor']; ?></th>
							<th width='100'><?php echo $rows['categoria']; ?></th>
							<th width='100'>
								<?php  
									if ($rows['quantidade'] != 0) { ?>
										<!-- Botão de Resevar -->
										<a href="processa/proc_reservar_livros.php?id=<?php echo $rows['id']; ?>">
											<button type="button" class="btn btn-sm btn-success"><i class="fas fa-cart-plus"> </i> Reservar Livro</button>
										</a>
								<?php }else{ ?>
										<!-- Botão de Resevar -->
										<button type="button" class="btn btn-sm btn-danger" disabled><i class="fas fa-cart-plus"> </i> Escotados</button>
								<?php } ?>
							</th>
						  </tr>
						</tbody>
					  </table>
					</div>
				</div>
			</div> <?php }
	}
?>