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
    
$entregaJustPara = filter_input(INPUT_POST, 'entregaJustPara', FILTER_SANITIZE_STRING);
    $v_entregaJustPara = trim($entregaJustPara);
    if(empty($v_entregaJustPara)){
        $v_entregaJustPara = NULL;
    }
 
$entregaJustDia = filter_input(INPUT_POST, 'entregaJustDia', FILTER_SANITIZE_STRING);
    if(empty($entregaJustDia)){
        $entregaJustDia = NULL;
    }
 
$entregaAvalPara = filter_input(INPUT_POST, 'entregaAvalPara', FILTER_SANITIZE_STRING);
$v_entregaAvalPara = trim($entregaAvalPara);
    if(empty($v_entregaAvalPara)){
        $v_entregaAvalPara = NULL;
    }
    
$entregaAvalDia = filter_input(INPUT_POST, 'entregaAvalDia', FILTER_SANITIZE_STRING);
    if(empty($entregaAvalDia)){
        $entregaAvalDia = NULL;
    }
    
$obs = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);

    

//TIRAR TODA ACENTUAÇÃO DA STRING OBSERVACAO E SUBSTITUIR MINUSCULA POR MAIUSCULA
function tirarAcentos($obs){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(ç)/","/(Ç)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A c C e E i I o O u U n N"),$obs);
}
$observacao = strtoupper(tirarAcentos($obs));
$v_observacao = trim($observacao);


$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar');
$tabela = "UPDATE controle SET data_envio_just_unimed = '$dataJust', quantidade_fr = '$fr', quantidade_fm = '$fm', data_envio_aval_unimed = '$dataAval ', ent_fat_just_para = '$v_entregaJustPara ', ent_fat_just_dia = '$entregaJustDia ', ent_fat_aval_para = '$v_entregaAvalPara ', ent_fat_aval_dia = '$entregaAvalDia', observacao = '$v_observacao' WHERE registro = '$registro' ";
$resultado = mysqli_query($conexao, $tabela);

if(mysqli_affected_rows($conexao)){
    header('location:posLogin.php');
}else{
    echo 'Erro ao alterar. Tente novamente';
}
?>

<br><br>

