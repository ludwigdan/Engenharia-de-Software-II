<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $id = $_GET['id'];
            if (isset($Pessoa)) 
                $acao = 'atualizar.php?id='.$id;  
            else
                $acao = 'inserir.php';
        ?>
        <form action= <?php echo $acao ?> method="POST">
            <label>Nome</label>
            <input type="text" name="nome" required value = "<?php if (isset($Pessoa)) echo $Pessoa['nome'];  ?>"/> <br/>
            <label>Endereço</label>
            <input type="text" name="endereco" required value = '<?php if (isset($Pessoa)) echo $Pessoa['endereco'];  ?>' /> <br/>
            <label>Idade</label>
            <input type="number" name="idade" required value = '<?php if (isset($Pessoa)) echo $Pessoa['idade'];  ?>' /> <br/>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>
