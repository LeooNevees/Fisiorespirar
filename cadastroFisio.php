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
    
    <style type="text/css">
            .centralizacao{
                text-align: center;
            }
            .cor{
                background-color: #20B2AA;
            }
    </style>
    
    <script type="text/javascript">  
        function validar(){
            var registro = form.registro.value;
            var nome = form.nome.value;
            
            if(registro == ''){
                alert("Informe o Registro.");
                return false;
            }       
            
            if(nome == ''){
                alert("Informe o Nome do Paciente.");
                return false;
            }     
            
            if(registro > 999999 || registro < 99999){
                alert("Registro tem que conter 6 números");
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
                                <form name="form" method="POST" action="cadastrobd.php">
                                    <br><br>
                                    <h3>Dados do Paciente</h3>
                                    <div class="form-row">                                        
                                        <div class="col">
                                            <input type="number" class="form-control" placeholder="Registro" id="registro" name="registro">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome">
                                        </div>
                                    </div>
                                    <br><br><br>
                                        <h3>Enviado a UNIMED</h3>
                                        <div class="form-row"> 
                                            <div class="col">
                                                <small>Avaliação</small>
                                                <input type="date" class="form-control" id="dataAval" name="dataAval">
                                            </div>
                                            <div class="col">
                                                <small>Justificativa</small>
                                                <input type="date" class="form-control" id="dataJust" name="dataJust">
                                            </div>
                                            <div class="col">
                                                <small>FR</small>
                                                <input type="number" class="form-control" placeholder="FR" id="fr" name="fr">
                                            </div>
                                            <div class="col">
                                                <small>FM</small>
                                                <input type="number" class="form-control" placeholder="FM" id="fm" name="fm">
                                            </div>
                                        </div>
                                        <br><br>

                                        <button type="submit" onclick="return validar()" class="btn btn-primary">Salvar</button>
                                </form>
                                <br><br><br><br><br><br>
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