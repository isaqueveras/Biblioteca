<?php  
    // Incluindo o arquivo de conexão
    include_once("conexao.php");
    // Quantidade de Linha do Tabela USUARIO
    $al = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) AS `count` FROM `usuarios`"));
    $alunos = $al['count'];
    // Quantidade de Linha do Tabela LIVROS
    $book = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) AS `count` FROM `livros`"));
    $livros = $book['count'];
    // Quantidade de Linha do Tabela RESEVADOS
    $re = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) AS `count` FROM `resevados`"));
    $agendados = $re['count'];
    // Quantidade de Linha do Tabela BANNER
    $ban = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) AS `count` FROM `banner`"));
    $banner = $ban['count'];
    // Quantidade de Linha do Tabela CATEGORIA_LIVRO
    $ca = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) AS `count` FROM `categoria_livro`"));
    $categoria = $ca['count'];
    // Quantidade de Linha do Tabela USUARIOS
    $id_user = $_SESSION['usuarioId'];
    $reservado_profile = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE id='$id_user' "));
    // Usuarios Online
    $uo = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) AS `count` FROM `usuarios` WHERE status='1'"));
    $user_online = $uo['count'];
?>
<style>
    .design-blue{
        height:100px;
        background:#fff;
        color:#636363;
        border:1px solid #f1f1f1;
    }
    .design-item-lg-black{
        float:right;
        margin-right:5px;
        background:none;
        font-size:35px;
        color:#636363;
        font-family:"Montserrat";
    }
</style>
<div class="container theme-showcase" role="main">
    <?php  
        if ($_SESSION['admNivelAcesso'] == 1) { ?>
        
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item design-blue">
                    <span class="design-item-lg-black">
                        <?php echo $alunos; ?>
                       </span>
                       <span class='glyphicon glyphicon-user'> </span> Alunos Cadastrado <h2>Alunos</h2>
                 </li>
            </ul>
         </div>

         <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item design-blue">
                    <span class="design-item-lg-black">
                        <?php echo $livros; ?> 
                       </span>
                       <span class='glyphicon glyphicon-book'> </span> Livros Cadastrado <h2>Livros</h2>
                 </li>
            </ul>
         </div>

         <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item design-blue">
                    <span class="design-item-lg-black">
                        <?php echo $agendados; ?> 
                       </span>
                       <span class='glyphicon glyphicon-book'> </span> Livros Agendados <h2>Agendados</h2>
                 </li>
            </ul>
         </div>

         <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item design-blue">
                    <span class="design-item-lg-black">
                        <?php echo $banner; ?> 
                    </span>
                    <span class='glyphicon glyphicon-book'> </span> Banners do Sistema <h2>Banners</h2>
                 </li>
            </ul>
         </div>

         <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item design-blue">
                    <span class="design-item-lg-black">
                        <?php echo $categoria; ?> 
                    </span>
                    <span class='glyphicon glyphicon-tag'> </span> Categorias de Livros <h2>Categoria</h2>
                 </li>
            </ul>
         </div>

         <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item design-blue">
                    <span class="design-item-lg-black">
                        <?php echo $user_online; ?> 
                    </span>
                    <span class='glyphicon glyphicon-user'> </span> Usuarios Online <h2>Online</h2>
                 </li>
            </ul>
         </div>

       <?php }else if($_SESSION['usuarioNivelAcesso'] == 0){ ?>
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item design-blue">
                    <span class="design-item-lg-black">
                        <?php
                            if($reservado_profile['qtd_pego'] < 10){
                                echo "0".$reservado_profile['qtd_pego'];
                            }else{
                                echo $reservado_profile['qtd_pego'];
                            }
                        ?> 
                    </span>
                    <span class='glyphicon glyphicon-book'> </span> Livros Pego na Biblioteca <h2>Reservados</h2>
                 </li>
            </ul>
         </div>
       <?php } ?>
  </div>