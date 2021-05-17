<?php
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$v_login = trim($login);
$v_senha = trim($senha);

if($v_login == '' || $v_senha == ''){
    echo 'Por favor retorne a página de login';
    return 0;
}
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar') or die("Erro ao conectar");
        

  // Validação do usuário/senha digitados

//ACESSO CORRETO
$tabela = "SELECT login, senha FROM usuario WHERE login = '$login' OR senha = '$senha' "; 
$resultado = mysqli_query($conexao,$tabela);
$linha = mysqli_fetch_assoc($resultado);

if($linha['login'] != $login){
    header('location:reLogin.html');
    exit();
}

if($linha['senha'] == $senha){
    header('location:posLogin.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Fisiorespirar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" href="assets/img/iconfisio.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <script type="text/javascript">
        function validar(){
            if(document.getElementById('login').value == ''){
                alert('Necessário informar um Login');
                return false;
            }
            if(document.getElementById('senha').value == ''){
                alert('Necessário informar uma Senha');
                return false;
            }
        }
         window.alert("Senha errada!");
    </script>
    
    <style type="text/css">
        /*Fonts*/
@import 'https://fonts.googleapis.com/css?family=Open+Sans';
@import 'https://fonts.googleapis.com/css?family=Galada';

::selection {
  background: #ffb7b7; /* WebKit/Blink Browsers */
}
::-moz-selection {
  background: #ffb7b7; /* Gecko Browsers */
}
* { 
  -moz-box-sizing: border-box; 
  -webkit-box-sizing: border-box; 
  box-sizing: border-box; 
}
:focus {outline:none}
/*Reset*/
body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, 
pre, form, fieldset, input, textarea, p, blockquote, th, td { 
  padding:0;
  margin:0;}
body,input{
  font-family:'Open sans',sans-serif;
  font-size:18px;
  color:#4c4c4c;
}
body{
  background-color:#292931;
  background:url(https://images.unsplash.com/photo-1451337516015-6b6e9a44a8a3?crop=entropy&fit=crop&fm=jpg&h=675&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=1375)  no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
form{
  margin: 10px 35px;
}
input{
  border:none;
}
a{
    text-decoration: none;
    color: rgb(255, 255, 255);
    
}
a:hover{
  color: rgba(255, 152, 0, 0.79);
  text-decoration: underline;
  
}
input[type=text], input[type=password] {
  width: 200px;
  height: 38px;
  border:1px solid #cbc9c9;
  padding-left:5px;
  margin-left:-5px;
  margin-top:3px;
  border-radius:0px 3px 3px 0px;
  -webkit-border-radius:0px 3px 3px 0px;
  -moz-border-radius:0px 3px 3px 0px;
}
input[type=submit]{
  width: 237px;
  height: 40px;
  margin-left:17px;
  border-radius:3px;
  background-color:#ae6a6a;
  color:#f8f8f8;
  border-radius:2px 2px 12px 12px;
  -webkit-border-radius:2px 2px 12px 12px;
  -moz-border-radius:2px 2px 12px 12px;
 
}
input[type=submit]:hover{
  background-color:#607d8b;
  color:#f8f8f8; 
  cursor:pointer;
  
}
#icon{
  background-color:#F4F4F4;
  color:#625864;
  display:inline-block;
  font-size:14px;
  padding-top:10px;
  padding-bottom:7px;
  width:40px;
  margin-left: 15px;
  margin-bottom:20px;
  text-align:center;
  border-top:solid 1px #cbc9c9;
  border-bottom:solid 1px #cbc9c9;
  border-left:solid 1px #cbc9c9;
  border-radius:3px 0 0 3px;
  -webkit-border-radius:3px 0 0 3px;
  -moz-border-radius:3px 0 0 3px; 
}
.wrapper{
  margin:50px auto;
  width: 343px; 
  height: 280px; 
  border-radius:5px;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
}
.wrapper h1{
  font-family: 'Galada', cursive;
  color:#f4f4f4;
  letter-spacing:8px;
  text-align:center;
  padding-top:5px;
  padding-bottom:5px;
}
.wrapper hr{
  opacity:0.2;
  
}
.crtacc{
  margin-left:75px;
}
    </style>
</head>

<body>
   
<div class="wrapper animated bounce">
    <br><br><br><br><br>
  <h1>Fisiorespirar</h1>
  <hr>
  <form method="POST" action="verificarLogin.php">
    <label id="icon" for="username"><i class="fa fa-user"></i></label>
    <input type="text" id="login" name="login" value="<?php echo $linha['login']; ?>">
    
    <label id="icon" for="password"><i class="fa fa-key"></i></label>
    <input type="password" placeholder="Senha" id="senha" name="senha">
    
    <input type="submit" value="Acessar" onclick="return validar()">
    <hr>
  </form>
</div>

</body>
</html>


