<?php
//BUSCA DE ATRASO JUSTIFICATIVA
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar');
$tabela = "SELECT registro, nome, data_envio_just_unimed, ent_fat_just_dia FROM controle WHERE ((data_envio_just_unimed <> '0000-00-00' AND ent_fat_just_dia = '0000-00-00') OR (data_envio_just_unimed <> '0000-00-00' AND ent_fat_just_dia IS NULL)) AND datediff(date(now()), data_envio_just_unimed) >= 10 AND (just_atraso IS NULL OR just_atraso = '') AND particular IS NULL ORDER BY data_envio_just_unimed ASC";
$resultado = mysqli_query($conexao, $tabela);
?>

<?php
//BUSCA DE ATRASO AVALIAÇÃO
$tabelaa = "SELECT registro, nome, data_envio_aval_unimed, ent_fat_aval_dia FROM controle WHERE ((data_envio_aval_unimed <> '0000-00-00' AND ent_fat_aval_dia = '0000-00-00') OR (data_envio_aval_unimed <> '0000-00-00' AND ent_fat_aval_dia IS NULL)) AND datediff(date(now()), data_envio_aval_unimed) >= 10 AND (just_atraso IS NULL OR just_atraso = '') AND particular IS NULL ORDER BY data_envio_aval_unimed ASC";
$resultadoo = mysqli_query($conexao, $tabelaa);

if(mysqli_num_rows($resultado) != 0|| mysqli_num_rows($resultadoo) != 0){
    echo "<script>alert('Existe atraso na UNIMED!');</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Fisiorespirar</title>
    <link rel="shortcut icon" href="assets/img/iconfisio.ico">

    <!-- build:css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">      

    <link rel="stylesheet" href="assets/css/theme.css">
    
    <script type="text/javascript">
            function validar(){
                if(document.getElementById('pesquisaReg').value == '' && document.getElementById('pesquisaNome').value == ''){
                    alert('Por favor digite um registro ou um nome');
                    return false;
                }
                if(document.getElementById('pesquisaReg').value > 999999){
                    alert('Registro possui no máximo 6 números');
                    return false;
                }
                if(document.getElementById('pesquisaReg').value > 0 && document.getElementById('pesquisaReg').value < 99999){
                    alert('Registro com menos de 6 números');
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

                    

                        <a href="gerarXLS.php" class="btn btn-outline-primary btn-sm">Baixar XLS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </li>  
                    
                </ul>              
                
            </div>
    </nav>
 <!-- FIM TÓPICO -->

      
<!-- Intro -->
<div class="intro">
<div class="intro-body">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1 class="brand-heading">FISIORESPIRAR</h1>
                                <br><br><br><br>
                                <h3>Pesquisar Paciente</h3>
                                <form method="POST" action="acessoControle.php">                               
                                    <div class="form-row">                                        
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Registro" id="pesquisaReg" name="pesquisaReg">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Nome" id="pesquisaNome" name="pesquisaNome">
                                        </div>
                                    </div>
                                    <br>    
                                    <button type="submit" name="enviar" onclick="return validar()" class="btn btn-primary">Buscar</button>
                                </form>                                
                                <br><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
		</div>
	</div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
