<?php
$registro = filter_input(INPUT_POST, 'registro', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$just = filter_input(INPUT_POST, 'just_atraso', FILTER_SANITIZE_STRING);

//TIRAR TODA ACENTUAÇÃO DA STRING OBSERVACAO E SUBSTITUIR MINUSCULA POR MAIUSCULA
function tirarAcentos($just){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(ç)/","/(Ç)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A c C e E i I o O u U n N"),$just);
}
$justAtraso = strtoupper(tirarAcentos($just));
$v_justAtraso = trim($justAtraso);

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar');
$tabela = "UPDATE controle SET just_atraso = '$v_justAtraso' WHERE registro = '$registro' ";
$resultado = mysqli_query($conexao, $tabela);

if(mysqli_affected_rows($conexao)){
    header('location:posLogin.php');
}else{
    echo 'Erro ao alterar. Tente novamente';
}
?>

<br><br>

