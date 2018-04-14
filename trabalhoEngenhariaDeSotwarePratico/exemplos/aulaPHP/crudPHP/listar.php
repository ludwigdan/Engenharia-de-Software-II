<?php
    require_once './conexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border = 1>
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Idade</th>
            </thead>   
        <?php
            $select = "SELECT * FROM pessoa";
            $querySelect = $bd->query($select);

            //mostrando os dados
            while($linha = $querySelect->fetch()){
                echo '<tr>';
                    echo "<td>".$linha['id']."</td>";
                    echo "<td>".$linha['nome']."</td>";
                    echo "<td>".$linha['endereco']."</td>";
                    echo "<td>".$linha['idade']."</td>";
                    echo "<td> <a href='excluir.php?id=".$linha['id']."' >Excluir</a> </td>";
                    echo "<td> <a href='buscar.php?id=".$linha['id']."' >Alterar</a> </td>";
                echo '</tr>';
            }  
        ?>         
        </table>
        <br>
        <a href="form.php">Cadastro Novo</a>
    </body>
</html>
