<?php

	$filtro=$_POST['filtro'];
	
	require_once '../../util/conexao.php';
	
	$select = "SELECT  preco FROM ingrediente where idingrediente = ".$filtro;
    $query  = $bd->query($select);    
    $dados  = $query->fetchAll();
	echo json_encode($dados);
	
?>