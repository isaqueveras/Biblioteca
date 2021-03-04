<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/busca_livro.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container"><br><br>
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            Opções do Sistema
                        </a>
                        <a href="administrativo.php" class="list-group-item">Dashboard</a>
                        <a href="administrativo.php?link=2" class="list-group-item">Listar Usuarios</a>
                    </div>
                </div>

                <div class="col-md-9">

                    <!-- Formulario de Pesquisa -->
                    <form method="POST" action="pesquisa_usuarios.php">
                        <div class="form-group">
                            <!-- campo de Pesquisa -->
                            <div class="input-group">
                                <input required type="text" name="pesquisa" class="form-control" id="pesquisa" placeholder="Pesquisar Usuarios">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-block"><span class='glyphicon glyphicon-zoom-in'> </span> Pesquisar</button>
                                </span>
                            </div>
                        </div>
                    </form><!-- Fim do Formulário -->

                    <h1><?php echo $_POST['pesquisa']; ?></h1>
                        
                    <div class="table-responsive">
                        <table class="table-hover table">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Matrícula</th>
                                    <th>Nivel de Acesso</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>a</td>
                                    <td>b</td>
                                    <td>v</td>
                                    <td>c</td>
                                    <td>s</td>
                                    <td>f</td>
                                    <td><button class="btn btn-primary">Açoes</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
   </div>
            
	<!-- JavaScript files-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>