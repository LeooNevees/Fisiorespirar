<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'fisiorespirar');
$tabela = "SELECT * FROM controle WHERE particular is null OR particular != 'sim' ORDER BY data_cadastro ASC ";
$resultado = mysqli_query($conexao, $tabela);


?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Planilha</title>
        <style type="text/css">
            .corJust{
                background-color: #8FBC8F;
            }
            .corAval{
                background-color: #FFB6C1;
            }
           
        </style>
    </head>
    
    <body>
        <?php
            //Nome do arquivo que será exportado
            $arquivo = 'Fisiorespirar.xlsx';
            
            //Criamos uma tabela HTML com o formato da Planilha
            $html = '';
            $html .= '<table border="1">';
            $html .= '<tr>';
            $html .= '<td colspan="9" height="40" align="center"><font size="4" color="red"><b>Justificativas e Avaliações enviadas à UNIMED</b></font></td>';
            $html .= '</tr>';
            
            $html .= '<tr>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td class="corJust" colspan="3" align="center"><font size="3"><b>Justificativas</b></font></td>';
            $html .= '<td></td>';
            $html .= '<td class="corAval" colspan="3" align="center"><font size="3"><b>Avaliações</b></font></td>';
            $html .= '</tr>';
            
            $html .= '<tr>';
            $html .= '<td width="101" height="40" align="center"><b>Registro</b></td>';
            $html .= '<td align="center"><b>Nome</b></td>';
            $html .= '<td class="corJust" align="center"><b>Envio UNIMED</b></td>';
            $html .= '<td class="corJust" align="center"><b>Entregue para</b></td>';
            $html .= '<td class="corJust" align="center"><b>Entregue dia</b></td>';
            $html .= '<td align="center" width="30"> - </td>';
            $html .= '<td class="corAval" align="center"><b>Envio UNIMED</b></td>';
            $html .= '<td class="corAval" align="center"><b>Entregue para</b></td>';
            $html .= '<td class="corAval" align="center"><b>Entregue dia</b></td>';
            $html .= '</tr>';
            
            //Selecionar todos os itens da tabela
            while ($linha = mysqli_fetch_assoc($resultado)){
                //BUSCA JUST OBSERVACAO INTERCAMBIO/ECONOMUS/FUNDACAO CESP
                $reg = $linha['registro'];
                $buscaObs = "SELECT * FROM controle WHERE registro = '$reg' AND (observacao LIKE '%INTERCAMBIO%' OR observacao LIKE '%ECONOMUS%' OR observacao LIKE '%FUNDACAO CESP%') ";
                $result_obs = mysqli_query($conexao, $buscaObs);
                
                //BUSCA AVAL OBSERVACAO ECONOMUS/FUNDACAO CESP
                $regi = $linha['registro'];
                $buscaObsA = "SELECT * FROM controle WHERE registro = '$regi' AND (observacao LIKE '%ECONOMUS%' OR observacao LIKE '%FUNDACAO CESP%') ";
                $result_obsA = mysqli_query($conexao, $buscaObsA);
                
                $html .= '<tr>';
                //Registro
                $html .= '<td align="center" height="25">' .$linha['registro'].'</td>';
                
                //Nome
                $nome = $linha['nome'];
                $nomeAbrev = mb_strimwidth($nome, 0, 17, "...");
                $html .= '<td align="center">' .$nomeAbrev.'</td>';
                
                //Justificativa (Data de Envio para UNIMED)
                if ($linha['data_envio_just_unimed'] == '0000-00-00' || $linha['data_envio_just_unimed'] == null){
                    if($busca_Obs = mysqli_fetch_assoc($result_obs)){
                        $data_envio_just_unimed = $busca_Obs['observacao'];
                    }else{
                        $data_envio_just_unimed = '';
                    }
                }else{
                    $data_envio_just_unimed = date('d/m', strtotime($linha['data_envio_just_unimed']));
                }
                $html .= '<td class="corJust" align="center">' .$data_envio_just_unimed.'</td>';
                
                //Entregue ao faturamento para
                $html .= '<td class="corJust" align="center">' .$linha['ent_fat_just_para'].'</td>';
                
                //Entregue ao faturamento dia
                if ($linha['ent_fat_just_dia'] == '0000-00-00' || $linha['ent_fat_just_dia'] == null){
                    $ent_fat_just_dia = '';
                }else{
                    $ent_fat_just_dia = date('d/m', strtotime($linha['ent_fat_just_dia']));
                }
                $html .= '<td class="corJust" align="center">' .$ent_fat_just_dia.'</td>';
                
                // - 
                $html .= '<td align="center" width="30"> - </td>';
                
                //Avaliação (Data de Envio para UNIMED)
                if ($linha['data_envio_aval_unimed'] == '0000-00-00' || $linha['data_envio_aval_unimed'] == null){
                    if($busca_ObsA = mysqli_fetch_assoc($result_obsA)){
                        $data_envio_aval_unimed = $busca_ObsA['observacao'];
                    }else{
                        $data_envio_aval_unimed = '';
                    }
                }else{
                    $data_envio_aval_unimed = date('d/m', strtotime($linha['data_envio_aval_unimed']));
                }
                $html .= '<td class="corAval" align="center">' .$data_envio_aval_unimed.'</td>';
                
                //Entregue ao faturamento para
                $html .= '<td class="corAval" align="center">' .$linha['ent_fat_aval_para'].'</td>';
                
                //Entregue ao faturamento dia
                if ($linha['ent_fat_aval_dia'] == '0000-00-00' || $linha['ent_fat_aval_dia'] == null){
                    $ent_fat_aval_dia = '';
                }else{
                    $ent_fat_aval_dia = date('d/m', strtotime($linha['ent_fat_aval_dia']));
                }
                $html .= '<td class="corAval" align="center">' .$ent_fat_aval_dia.'</td>';
                
                $html .= '</tr>';
            }
            
            //Configurações header para forçar o Download
            header("Expires: Mon, 26 Jul 1997 05:00>00 GMT");
            header("Last-Modified: " . gmdate("D, d M Yh:i:s"). " GMT");
            header("Cache-control: no-cache, must-revalidate");
            header("Pragma: no-cache");
            header("Content-type: application/x-msexcel");
            header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
            header("Content-Description: PHP Generated Data" );
            
          //Envia o conteúdo do arquivo
          echo $html;
          exit;
        ?>        
    </body>
</html>

