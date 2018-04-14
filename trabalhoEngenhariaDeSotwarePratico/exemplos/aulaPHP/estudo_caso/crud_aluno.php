<?php

    if(!isset($_GET['acao'])) $acao = "listar";
    else $acao = $_GET['acao'];
    
    if($acao == "listar"){
        $sql = "SELECT * FROM aluno";
        $query = $bd->query($sql);
        $lista = $query->fetchAll();
        require './listaAluno.php';
    }
