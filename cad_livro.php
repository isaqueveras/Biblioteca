<?php  
	include_once("seguranca_adm.php");

	$resultado = mysql_query("SELECT * FROM categoria_livro ORDER BY 'id' ");
	$linhas = mysql_num_rows($resultado);
?>
<div class="container theme-showcase" role="main">
    <nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="administrativo.php">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-images"> </i> Cadastrar Banners </li>
	  </ol>
	</nav>
	<div class="row">
		<div class="col-md-12">
            <form method="POST" action="processa/cadastrar_livro.php" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-4">
                        <img src="imagens/livros/Ex_Livros.jpg" alt="" class="img-thumbnail" style="margin-bottom:5px;" name="img">
                        <label>Imagem do Livro </label> <small>*.png ou .jpg</small>
                        <div class="custom-file form-controsl">
                            <input type="file" class="btn btn-block btn-default" name="info" onchange="previewImagem()">
                        </div><br>
						<!-- Botão de Cadastrar -->
						<button class="btn btn-success"> <span class='glyphicon glyphicon-ok'> </span> Cadastrar</button>
						<!-- Botão de Cancelar -->
                        <a href="administrativo.php?link=12" class="btn btn-danger"> <span class='glyphicon glyphicon-remove'> </span> Cancelar</a>

                    </div>
				
                    <div class="col-md-4">
                        <label for="TitLiv">Nome do Livro</label>
                        <input type="text" class="form-control" placeholder="Título do Livro" id="TitLiv" style="margin-bottom:5px;" name="livro">
					</div>
					
					<div class="col-md-4">
                        <label for="TitBan">Autor</label>
                        <input type="text" class="form-control" placeholder="Autor" id="TitBan" style="margin-bottom:5px;" name="autor">
					</div>

					<div class="col-md-4">
                        <label for="qtdliv">Quantidade</label>
                        <input type="text" class="form-control" placeholder="Quantidade" id="qtdliv" style="margin-bottom:5px;" name="quantidade">
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="InputCategoria">Categoria</label>
						<div class="col-sm-4">
							<select class="form-control" name="categoria" id="InputCategoria">
								<?php  
									while($linhas = mysql_fetch_array($resultado)){ ?>
										<option value="<?php echo $linhas['nome']; ?>"><?php echo $linhas['nome']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
                    <div class="col-md-8">
                        <label for="TextBan">Sinopse</label>
                        <textarea type="text" class="form-control ckeditor" placeholder="Sinopse" id="TextBan" style="margin-bottom:5px;" name="descricao"></textarea>
                    </div>
                  
                </div>
            </form>
		</div>
	</div>
</div> 

<script>
	function previewImagem(){
		var imagem = document.querySelector('input[name=info]').files[0];
		var preview = document.querySelector('img[name=img]');
				
		var reader = new FileReader();
				
		reader.onloadend = function () {
			preview.src = reader.result;
		}
				
		if(imagem){
			reader.readAsDataURL(imagem);
		}else{
			preview.src = "";
		}
	}
</script>
<script src="plugins/ckeditor/ckeditor.js"></script>