<?php
$pesquisa = filter_input(INPUT_POST, 'pesquisaReg', FILTER_SANITIZE_STRING);
$pesquisan = filter_input(INPUT_POST, 'pesquisaNome', FILTER_SANITIZE_STRING);

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar');
$tabela = "SELECT registro, nome, date_format(`data_envio_just_unimed`,'%d/%m/%Y') as data_envio_just_unimed, quantidade_fr, quantidade_fm, date_format(`data_envio_aval_unimed`,'%d/%m/%Y') as data_envio_aval_unimed, ent_fat_just_para, date_format(`ent_fat_just_dia`,'%d/%m/%Y') as ent_fat_just_dia, ent_fat_aval_para, date_format(`ent_fat_aval_dia`,'%d/%m/%Y') as ent_fat_aval_dia, particular, data_cadastro FROM controle WHERE registro LIKE '%$pesquisa%' AND nome LIKE '%$pesquisan%' ";
$resultado = mysqli_query($conexao, $tabela);
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
    </head>
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

                    
                        <a href="gerarXLS.php" class="btn btn-outline-primary btn-sm">Baixar XLS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </li>  
                    
                </ul>              
                
            </div>
    </nav>
 <!-- FIM TÓPICO -->

      
<!-- PÁGINA -->
    <div class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-13">
                        <h1 class="brand-heading">FISIORESPIRAR</h1>
                        <br><br><br>
                        <?php if(mysqli_num_rows($resultado)!= 0){ ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                    <th scope="col">Registro: </th>
                                    <th scope="col">Nome: </th>
                                    <th scope="col">Data Envio Just para UNIMED: </th>
                                    <th scope="col">Fr: </th>
                                    <th scope="col">Fm: </th>
                                    <th scope="col">Data Envio Aval para UNIMED: </th>
                                    <th scope="col">Entregue Just Faturamento Para: </th>
                                    <th scope="col">Entregue Just Faturamento Dia: </th>
                                    <th scope="col">Entregue Aval Faturamento Para: </th>
                                    <th scope="col">Entregue Aval Faturamento Dia: </th>
                                    </tr>


                            </thead>

                            <tbody>
                                <?php while($linha = mysqli_fetch_assoc($resultado)){ ?>
                                    <?php if($linha['particular'] == 'sim'){ ?>
                                            <tr>
                                            <td><?php echo $linha['registro']; ?></td>
                                            <td><?php echo $linha['nome']; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo $linha['quantidade_fr']; ?></td>
                                            <td><?php echo $linha['quantidade_fm']; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo 'PARTICULAR'; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo 'PARTICULAR'; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><a href="editdados.php?registro=<?php echo $linha['registro']; ?> " class="btn btn-primary btn-sm"">Editar</a></td>
                                            </tr>
                                         <?php }else{  ?> 
                                    <tr>
                                        <td><?php echo $linha['registro']; ?></td>
                                        <td><?php echo $linha['nome']; ?></td>
                                        <td><?php echo $linha['data_envio_just_unimed'] ?></td>
                                        <td><?php echo $linha['quantidade_fr']; ?></td>
                                        <td><?php echo $linha['quantidade_fm']; ?></td>
                                        <td><?php echo $linha['data_envio_aval_unimed']; ?></td>
                                        <td><?php echo $linha['ent_fat_just_para']; ?></td>
                                        <td><?php echo $linha['ent_fat_just_dia']; ?></td>
                                        <td><?php echo $linha['ent_fat_aval_para']; ?></td>
                                        <td><?php echo $linha['ent_fat_aval_dia']; ?></td>
                                        <td><a href="editdados.php?registro=<?php echo $linha['registro']; ?> " class="btn btn-primary btn-sm"">Editar</a></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php }else{ ?>
                        <div class="alert alert-danger" role="alert">Nome ou registro não encontrado!</div>
                        <?php } ?>
                        <br><br><br>
                        <a href="cadastroFisio.php" class="btn btn-primary">Cadastrar Novo Paciente</a>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>

