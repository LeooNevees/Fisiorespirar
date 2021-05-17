<?php
//TABELA REFERENTE A JUSTIFICATIVA
$dataEnvio = filter_input(INPUT_GET, 'dataEnvio', FILTER_SANITIZE_STRING);
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar');
$tabela = "SELECT registro, nome, quantidade_fr, quantidade_fm FROM controle WHERE data_envio_just_unimed = '$dataEnvio' ORDER BY nome ASC; ";
$resultado = mysqli_query($conexao, $tabela);
?>

<?php
//TABELA REFERENTE A AVALIAÇÃO
$dataEnvioo = filter_input(INPUT_GET, 'dataEnvio', FILTER_SANITIZE_STRING);
$tabelaa = "SELECT registro, nome FROM controle WHERE data_envio_aval_unimed = '$dataEnvioo' ORDER BY nome ASC;";
$resultadoo = mysqli_query($conexao, $tabelaa);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Fisiorespirar</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS TABELA -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="shortcut icon" href="assets/img/iconfisio.ico">
        <!-- FIM CSS -->

        <!-- CSS SITE -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- FIM CSS -->

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/theme.css"> 

        <script type="text/javascript">
                function verificar(){
                    if(document.getElementById('dataEnvio').value == ''){
                        alert('Por favor digite algo no campo Data de Envio');
                        return false;
                    }

                }
        </script>
    
    
    </head>

    <body>      
        <!-- TÓPICO -->
    <nav class="navbar navbar-expand-md navbar-custom fixed-top">
        <ul>
            
            <div class="btn-group">
                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Particular</button>
                <div class="dropdown-menu"> 
                    <a class="dropdown-item" href="acessoParticular.html">Cadastro de Paciente</a>
                    <a class="dropdown-item" href="acessoBdParticular.php">Pacientes Cadastrados</a>
                    <a class="dropdown-item" href="controleParticular.html">Relatório Mensal</a>                
                </div>
            </div>
        </ul>

            <div class="collapse navbar-collapse" id="navbarsDefault">
                <ul class="navbar-custom navbar-nav ml-auto">
                                        
                    <li class="nav-item">       
                        <a href="poslogin.php"class="btn btn-outline-light btn-sm">Início</a>
                        
                        <div class="btn-group">
                            <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios Diários</button>
                            <div class="dropdown-menu"> 
                                <a class="dropdown-item" href="controleUnimed.html">Protocolo Unimed</a>
                                <a class="dropdown-item" href="controleBeneficencia.php">Protocolo Beneficência</a>
                                <a class="dropdown-item" href="entregaFatSNome.php">Retornados Unimed</a>
                                <a class="dropdown-item" href="atrasoUnimed.php">Atrasos Unimed</a>
                            </div>
                        </div>
                     
                        <div class="btn-group">
                            <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pacientes</button>
                            <div class="dropdown-menu"> 
                                <a class="dropdown-item" href="cadastroFisio.php">Cadastro de Pacientes</a>
                                <a class="dropdown-item" href="acessobd.php">Pacientes Cadastrados</a>                
                            </div>
                        </div>

                    
                        <button type="button" class="btn btn-outline-primary btn-sm">Sair</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </li>  
                    
                </ul>              
                
            </div>
    </nav>
 <!-- FIM TÓPICO -->

<!-- Página -->
    <div class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row justify-content-center">
			<div class="col-md-13">
                            <h1 class="brand-heading">FISIORESPIRAR</h1>
                            <br><br><br><br><br>
                                <?php if(mysqli_num_rows($resultado) == 0 && mysqli_num_rows($resultadoo) == 0){ ?>
                                    <div class="alert alert-danger" role="alert">Não foi enviado nada neste dia!</div>
                                <?php } ?>
                                    
                                <?php if(mysqli_num_rows($resultado) != 0){ ?>
                                <table class="table table-striped table-dark">
                                    <thead>
                                        <h2>Justificativa</h2>
                                        <tr>
                                        <th scope="col">Registro: </th>
                                        <th scope="col">Nome: </th>
                                        <th scope="col">Fr: </th>
                                        <th scope="col">Fm: </th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        <?php while($linha = mysqli_fetch_assoc($resultado)){ ?>
                                            <tr>
                                                <td><?php echo $linha['registro']; ?></td>
                                                <td><?php echo $linha['nome']; ?></td>
                                                <td><?php echo $linha['quantidade_fr']; ?></td>
                                                <td><?php echo $linha['quantidade_fm']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>                                   
                                </table>
                            <?php } ?>
                            
                            <br><br><br><br>
                            
                            <?php if(mysqli_num_rows($resultadoo)!= 0){ ?>
                                <table class="table table-striped table-dark">
                                    <thead>
                                        <h2>Avaliação</h2>
                                        <tr>
                                        <th scope="col">Registro: </th>
                                        <th scope="col">Nome: </th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        <?php while($linhaa = mysqli_fetch_assoc($resultadoo)){ ?>
                                            <tr>
                                                <td><?php echo $linhaa['registro']; ?></td>
                                                <td><?php echo $linhaa['nome']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>                                    
                                </table>
                                <?php } ?>
                                
                                <a href="controleUnimed.html" class="btn btn-primary">Novo Relatório</a>
                                <br><br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


