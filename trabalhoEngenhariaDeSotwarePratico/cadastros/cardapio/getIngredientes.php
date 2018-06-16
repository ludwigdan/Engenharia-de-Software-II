<?php

	require_once '../../util/conexao.php';
	
	$select = "SELECT idingrediente, descricao, unidademedida, porcao, preco FROM ingrediente order by descricao, unidademedida, porcao";
    $query  = $bd->query($select);    
    $dados  = $query->fetchAll();
	echo json_encode($dados);
	
?>