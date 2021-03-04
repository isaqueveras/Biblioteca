<?php  
	include_once("conexao.php");
    $id = $_GET['id'];
	$resultado = mysql_query("SELECT * FROM banner WHERE id = '$id' LIMIT 1");
	$linhas = mysql_fetch_assoc($resultado);
?>
<div class="container theme-showcase" role="main">
    <nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="administrativo.php">Dashboard</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-images"> </i> Editar Banner </li>
	  </ol>
	</nav> 
	<div class="row">
		<div class="col-md-12">
            <form method="POST" action="processa/editar_banner.php?id=<?php echo $linhas['id']; ?>" enctype="multipart/form-data">
                <input type="hidden" name="img_velha" value="<?php echo $linhas['img']; ?>">
				<div class="form-row">
                    <div class="col-md-4">
                        <img src="imagens/banner/<?php echo $linhas['img']; ?>" alt="" class="img-thumbnail" style="margin-bottom:5px;" name="img">
                        <input type="file" class="btn btn-block btn-default" name="info" onchange="previewImagem()" value="<?php echo $linhas['img'] ?>">
                    </div>
                    <div class="col-md-8">
                        <label for="TitBan">Título do Banner</label>
                        <input type="text" class="form-control" placeholder="Título do Banner" id="TitBan" style="margin-bottom:5px;" name="titulo" value="<?php echo $linhas['titulo'] ?>">
                    </div>
                    <div class="col-md-8">
                        <label for="TextBan">Texto do Banner</label>
                        <textarea type="text" class="form-control" placeholder="Texto do Banner" id="TextBan" rows="4" style="margin-bottom:5px;" name="texto"><?php echo $linhas['texto'] ?></textarea>
                    </div>
                    <div class="col-md-8">
                        <button class="btn btn-success">Editar</button>
                        <a href="administrativo.php?link=22" class="btn btn-danger">Cancelar</a>
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