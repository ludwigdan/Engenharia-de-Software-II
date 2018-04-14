<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Estados</title>
    </head>
    <body>
        <h2>Cadastro de Estado</h2>
        <form name="crudEstado" action="<?php echo $action;?>" method="POST">
            <div>
                <label>Nome</label>
                <input type="text" name="nome" value="" required/>
            </div>
            <div>
                <label>UF</label>
                <input type="text" name="uf" value="" maxlength="2" required/>
            </div>
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>
