<?php
$particular = filter_input(INPUT_GET, 'particular', FILTER_SANITIZE_STRING);

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    </head>
    
    <body>
        <div>
            <input type="hidden" id="particular" name="particular" value="<?php echo $particular; ?>">
        </div>
    </body>
    <script type="text/javascript">
        var particular = document.getElementById('particular').value;
        
           if(particular == 'sim'){
               window.alert('Impossível continuar. Número de Registro já existente');
               window.location.href = "acessoParticular.html";
           }else{
               window.alert('Impossível continuar. Número de Registro já existente');
               window.location.href = "cadastroFisio.php";
           }
            
        </script>
</html>