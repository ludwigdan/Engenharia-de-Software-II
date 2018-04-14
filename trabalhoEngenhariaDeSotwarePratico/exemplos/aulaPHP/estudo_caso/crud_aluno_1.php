<?php

    
    if(!isset($_GET['acao'])) $acao = "listar";
    else $acao = $_GET['acao'];

    if($acao == "listar"){
        $sql = "SELECT * FROM aluno";
    }
