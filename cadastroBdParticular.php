<?php
$registro = filter_input(INPUT_POST, 'registro', FILTER_SANITIZE_STRING);
    $v_registro = trim($registro);
    
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $v_nome = trim($nome);
    
$fr = filter_input(INPUT_POST, 'fr', FILTER_SANITIZE_NUMBER_INT);
$fm = filter_input(INPUT_POST, 'fm', FILTER_SANITIZE_NUMBER_INT);
$data = date("Y-m-d");
$particular = filter_input(INPUT_POST, 'particular', FILTER_SANITIZE_STRING);

//Validador de Informações
if($v_registro == '' || $v_nome == ''){
    echo 'Retorne a pagina anterior e preencha o campo registro e nome';
    return false;
}

//Conexão ao banco de dados
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar') or die("Erro ao conectar");

$tabela = "INSERT INTO controle(registro, nome, quantidade_fr, quantidade_fm, particular, data_cadastro) VALUES('$registro', '$v_nome', '$fr', '$fm', '$particular', '$data');";
$resultado = mysqli_query($conexao, $tabela) or die(header("location:alertaReg.php?particular=$particular "));


if(mysqli_affected_rows($conexao)){
    header('location:acessoParticular.html');
}else{
    echo 'Erro ao cadastrar. Tente novamente';
}

?>

