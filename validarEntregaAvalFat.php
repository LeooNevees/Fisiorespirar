<?php
$registro = filter_input(INPUT_GET, 'registro', FILTER_SANITIZE_STRING);
$nomePessoa = filter_input(INPUT_GET, 'nomePessoa', FILTER_SANITIZE_STRING);
    $v_nomePessoa = trim($nomePessoa);
    if(empty($v_nomePessoa)){
        $v_nomePessoa = NULL;
    }
$entrega = filter_input(INPUT_GET, 'entrega', FILTER_SANITIZE_STRING);
$d = null;
date_default_timezone_set("America/Sao_Paulo");

//VALIDADOR DA BOTÃO HOJE E AMANHA PARA ATRIBUIR A DATA CORRETA
if ($entrega == 'hoje') {
    $d = new DateTime("NOW");
} else if ($entrega == 'amanha') {
    $d = new DateTime("TOMORROW");
}
$data = $d !== null ? $d->format('Y-m-d') : null;

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar');
$tabela = "UPDATE controle SET ent_fat_aval_para = '$v_nomePessoa', ent_fat_aval_dia = '$data' WHERE registro = '$registro' ";
$resultado = mysqli_query($conexao, $tabela);

if(mysqli_affected_rows($conexao)){
    header('location:entregaFatCNome.php?nomePessoa='.$v_nomePessoa);
}else{
    echo 'Erro ao alterar. Tente novamente';
}
?>

    

