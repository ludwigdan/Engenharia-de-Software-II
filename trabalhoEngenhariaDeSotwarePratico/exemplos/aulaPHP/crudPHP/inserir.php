<?php

    require_once './conexao.php';

    $insert = "INSERT INTO pessoa(nome, endereco, idade) "
        . " VALUES(:nome, :endereco, :idade)";
    $query = $bd->prepare($insert);
    $r     = $query->execute($_POST);

    if($r){
        echo "Cadastrado com Sucesso";
    }else{
        echo "Erro ao cadastrar";
    }
    echo "<br> <a href='listar.php'>Voltar</a>";
?>