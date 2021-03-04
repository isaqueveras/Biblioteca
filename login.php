<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Acesso ao Sistema</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/signin.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="imagens/favicon.ico">
   </head>
  <body background="imagens/white_leather.png">
     <!--// destroi todas as variaves impedindo acesso pela url-->
    <?php 
		  unset(
        $_SESSION['usuarioId'],
        $_SESSION['usuarioNome'],
        $_SESSION['usuarioNivelAcesso'],
        $_SESSION['usuarioLogin'],
        $_SESSION['usuarioEmail'],
        $_SESSION['usuarioMatricula'],
        $_SESSION['usuarioSenha']
      );
      unset(
        $_SESSION['admId'],       
        $_SESSION['admNome'],     
        $_SESSION['admNivelAcesso'], 
        $_SESSION['admLogin'], 
        $_SESSION['admEmail'],
        $_SESSION['admMatricula'],    
        $_SESSION['admSenha']
      );
     ?>
    <div class="container">
      <form class="form-signin" method="POST" action="valida_login.php">
        <img src="imagens/logo.png" class="img-responsive">
        <!-- <label for="inputEmail" class="rs-only">Usuario</label>-->
        <input type="text" name="matricula" class="form-control margin-bottom" placeholder="Matrícula" required autofocus>             
        <!--<label for="inputPassword" class="rs-only">Senha</label>-->
        <input type="password" name="senha" class="form-control margin-bottom" placeholder="Senha" required />
        <button class="btn btn-lg btn-primary btn-block"><i class="fa fa-sign-out-alt"> </i> Acessar</button><br>
        <p class="text-primary" align="center">Não tem uma conta? <a href="" data-toggle="modal" data-target="#criar_conta"><i>clique aqui!</i></a></p>
        <?php

          if(isset($_SESSION['cor'])):
            $cor = $_SESSION['cor'];
            unset ($_SESSION['cor']);
          else:
            $cor = "danger";
          endif;
              if(isset($_SESSION['loginErro'])){ ?>
                <div class="alert alert-<?php echo $cor; ?>" role="alert">
                  <center><?php echo $_SESSION['loginErro']; ?></center>
                </div>  
                <?php unset ($_SESSION['loginErro']);
              } ?>

      </form>

    </div>

    <div class="modal fade" id="criar_conta" tabindex="-1" role="dialog" aria-labelledby="criar_conta" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="criar_conta"><i class="fas fa-users"> </i> CRIAR CONTA</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">

                          <form method="POST" action="processa/proc_cad_usuario_usu.php">

                            <div class="form-row">
                              <div class="form-group col-md-9">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome_usu" required="">
                              </div>
                              <div class="form-group col-md-3">
                                <label for="num">Número</label>
                                <input type="number" class="form-control" id="num" min="01" max="60" placeholder="Numero" name="num_usu" required="">
                              </div>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="matricula">Matrícula</label>
                              <input type="text" class="form-control" id="matricula" placeholder="Matrícula" name="mat_usu" required="">
                            </div>

                            <div class="form-group col-md-6">
                              <label for="senha">Senha</label>
                              <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha_usu" required="">
                            </div>

                            <div class="form-group col-md-12">
                              <label for="email">E-mail</label>
                              <input type="email" class="form-control" id="email" placeholder="E-mail" name="email_usu" required="">
                            </div>

                            <div class="form-group col-md-12">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar </button>
                              <button class="btn btn-success"><i class="fa fa-check"></i> Criar conta</button>
                            </div>

                          </form>

                        </div>

                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar </button>
                          <a href="processa/proc_apagar_usuario.php?id=<?php echo $linhas['id']; ?>" class="btn btn-success"><i class="fa fa-check"></i> Criar conta</a> -->
                        </div>

                      </div>
                    </div>
                  </div>

    <!-- JavaScript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
  </body>
</html>