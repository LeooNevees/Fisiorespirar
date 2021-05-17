<?php
$registro = filter_input(INPUT_POST, 'registro', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$dataJust = filter_input(INPUT_POST, 'dataJust', FILTER_SANITIZE_STRING);
    if(empty($dataJust)){
        $dataJust = NULL;
    }

$fr = filter_input(INPUT_POST, 'fr', FILTER_SANITIZE_NUMBER_INT);
    if(empty($fr)){
        $fr = NULL;
    }
    
$fm = filter_input(INPUT_POST, 'fm', FILTER_SANITIZE_NUMBER_INT);
    if(empty($fm)){
        $fm = NULL;
    }
    
$dataAval = filter_input(INPUT_POST, 'dataAval', FILTER_SANITIZE_STRING);
    if(empty($dataAval)){
        $dataAval = NULL;
    }
    
$data = date("Y-m-d");


//Validador de Informações
$v_registro = trim($registro);
$v_nome = trim($nome);


if($v_registro == '' || $v_nome == ''){
    echo 'Retorne a pagina anterior e preencha o campo registro e nome';
    return false;
}

//Conexão ao banco de dados
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar') or die("Erro ao conectar");

$tabela = "INSERT INTO controle(registro, nome, data_envio_just_unimed, quantidade_fr, quantidade_fm, data_envio_aval_unimed, data_cadastro) VALUES('$registro', '$v_nome', '$dataJust', '$fr', '$fm', '$dataAval', '$data');";
$resultado = mysqli_query($conexao, $tabela) or die(header("location:alertaReg.php?particular=$particular "));


if(mysqli_affected_rows($conexao)){
    header('location:posLogin.php');
}else{
    echo 'Erro ao cadastrar. Tente novamente';
}

?>
