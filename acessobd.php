<?php
//verificar se esta sendo passado na url a pagina atual, senão é atribuido a pagina 1
$pagina = (isset($_GET['pagina']))? $_GET['pagina']: 1;

//selecionar todos os pacientes
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar');
$tabela = "SELECT * FROM controle WHERE particular IS NULL;";
$resultado = mysqli_query($conexao, $tabela);

//contar o total de paciente
$total_pacientes = mysqli_num_rows($resultado);

//setar a quantidade  por pagina
$quantidade_pg = 15;

//calcular o numero de pagina necessarias para apresentar os pacientes
$num_pagina = ceil($total_pacientes/$quantidade_pg);

//calcular o inicio da visualizacao
$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

//selecionar os itens a serem apresentados na pagina
$result_pacientes = "SELECT registro, nome, date_format(`data_envio_just_unimed`,'%d/%m/%Y') as data_envio_just_unimed, quantidade_fr, quantidade_fm, date_format(`data_envio_aval_unimed`,'%d/%m/%Y') as data_envio_aval_unimed, ent_fat_just_para, date_format(`ent_fat_just_dia`,'%d/%m/%Y') as ent_fat_just_dia, ent_fat_aval_para, date_format(`ent_fat_aval_dia`,'%d/%m/%Y') as ent_fat_aval_dia FROM controle WHERE particular IS NULL ORDER BY data_cadastro DESC LIMIT $inicio, $quantidade_pg;";
$resultado_pacientes = mysqli_query($conexao, $result_pacientes);
$total_cursos = mysqli_num_rows($resultado_pacientes);
?>

<!doctype html>
<html lang="pt-br">
    <head>
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
        
        <!-- CSS PAGINAÇÃO PROX E ANT -->
        <style>
        .numero{
            text-decoration: none;
            background: #2A85B6;
            text-align: center;
            padding: 3px 0;
            display: block;
            margin: 0 2px;
            float: left;
            width: 20px;
            color: #fff;
        }
        
        .numero:hover, .numativo, .controle:hover{
            background: #1B3B54;
        }
        
        .controle{
            text-decoration: none;
            background: #2A85B6;
            text-align: center;
            padding: 3px 8px;
            display: block;
            margin: 0 3px;
            float: left;
            color: #fff;
        }
    </style>


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
                                <a class="dropdown-item" href="entregaFatSNome.php">Retornardos Unimed</a>
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
        
        
        <div class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row justify-content-center">
			<div class="col-md-13">
                            <h1 class="brand-heading">FISIORESPIRAR</h1>
                                <table class="table table-striped table-dark">
                                    <thead>
                                        <tr>
                                        <th scope="col">Registro: </th>
                                        <th scope="col">Nome: </th>
                                        <th scope="col">Data Envio Just para UNIMED: </th>
                                        <th scope="col">Fr: </th>
                                        <th scope="col">Fm: </th>
                                        <th scope="col">Entregue Just Faturamento Para: </th>
                                        <th scope="col">Entregue Just Faturamento Dia: </th>
                                        <th scope="col">Data Envio Aval para UNIMED: </th>
                                        <th scope="col">Entregue Aval Faturamento Para: </th>
                                        <th scope="col">Entregue Aval Faturamento Dia: </th>
                                        </tr>


                                    </thead>

                                    <tbody>
                                        <?php while($linha = mysqli_fetch_assoc($resultado_pacientes)){ ?>
                                            <tr>
                                                <td><?php echo $linha['registro']; ?></td>
                                                <td><?php echo $linha['nome']; ?></td>
                                                <td><?php echo $linha['data_envio_just_unimed'] ?></td>
                                                <td><?php echo $linha['quantidade_fr']; ?></td>
                                                <td><?php echo $linha['quantidade_fm']; ?></td>
                                                <td><?php echo $linha['ent_fat_just_para']; ?></td>
                                                <td><?php echo $linha['ent_fat_just_dia']; ?></td>
                                                <td><?php echo $linha['data_envio_aval_unimed']; ?></td>
                                                <td><?php echo $linha['ent_fat_aval_para']; ?></td>
                                                <td><?php echo $linha['ent_fat_aval_dia']; ?></td>
                                                <td><a href="editdados.php?registro=<?php echo $linha['registro']; ?> " class="btn btn-primary btn-sm" >Editar</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>      
                        </div>
                        <?php  
                            //verificar a pagina anterior e posterior
                        $pagina_anterior = $pagina - 1;
                        $pagina_posterior = $pagina + 1;
                        ?>
                        <nav aria-label="Navegação de página exemplo">
                            <ul class="pagination">
                                <?php
                                    if($pagina_anterior != 0){ ?>
                                       <li class="page-item"><a class="btn btn-primary btn-sm" href="acessobd.php?pagina=<?php echo $pagina_anterior; ?>">Anterior</a></li> 
                                    <?php }else{ ?>
                                       <li class="page-item"><a class="btn btn-primary btn-sm">Anterior</a></li> 
                                    <?php } ?>
                                                                
                                <?php  
                                    //Apresentar a paginacao
                                    for($i=1; $i < $num_pagina + 1; $i++){  ?>
                                <li class="page-item"><a class="btn btn-primary btn-sm" href="acessobd.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>                                    
                                <?php } ?>
                                
                                <?php
                                    if($pagina_posterior <= $num_pagina){ ?>
                                       <li class="page-item"><a class="btn btn-primary btn-sm" href="acessobd.php?pagina=<?php echo $pagina_posterior; ?>">Próximo</a></li> 
                                    <?php }else{ ?>
                                       <li class="page-item"><a class="btn btn-primary btn-sm">Próximo</a></li> 
                                    <?php } ?>
                            </ul>
                          </nav>
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