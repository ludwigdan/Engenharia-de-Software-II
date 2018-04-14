<?php

require_once './conexao.php';

    if(isset($_GET['acao'])){
        $acao = $_GET['acao'];
    }else{
        $acao = 'listar';
    }

    if($acao == "listar"){
        $select = "SELECT * FROM estado";
        $query  = $bd->query($select);
        
        $dados  = $query->fetchAll();
        require './lista_estado.php';
    }
    else if($acao == "novo"){
        $action = "crud_estado.php?acao=inserir";
        require './form_estado.php';
    }
    else if($acao == "inserir"){
        $insert = "INSERT INTO estado(nome, uf) "
                . " VALUES(:nome, :uf)";
        $query  = $bd->prepare($insert);
        if($query->execute($_POST)){
            header('Location: crud_estado.php?acao=listar');
        }else{
            echo "Erro ao cadastrar";
        }
    }
    else if($acao == "excluir"){
        $id = $_GET['id'];
        $delete = "DELETE FROM estado "
                . " WHERE idestado=$id";
        if($bd->query($delete)){
            header('Location: crud_estado.php?acao=listar');
        }else{
            echo "Erro ao tentar remover o registro $id";
        }
    }
    
    

