<?php

    require_once './conexao.php';
    $id = $_GET ['id'];
    
    
    $delete = "Delete From pessoa Where id=".$id;
    $query = $bd->query($delete);
    
    if($query){
        header('Location: listar.php');
    }else{
        echo "Erro ao remover";
    }
    
?>

