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
        <a href="crud_estado.php?acao=novo">Novo</a>
        <table>
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>UF</th>
                <th>Editar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php foreach($dados as $linha){ ?>
                <tr>
                    <td><?= $linha['idestado']; ?></td>
                    <td><?= $linha['nome']; ?></td>
                    <td><?= $linha['uf']; ?></td>
                    <td><a href="">Editar</a></td>
                    <td><a href="crud_estado.php?acao=excluir&id=<?php echo $linha['idestado']; ?>">Excluir</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
