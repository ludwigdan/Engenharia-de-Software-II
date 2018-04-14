<?php
    require_once './conexao.php';
    
    $select = "Select * from Pessoa where id = ".$_GET['id']; 
   
    $query = $bd->query($select);
    
    $Pessoa = $query->fetch();
    
    
    require './form.php';
    
?>