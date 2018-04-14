<?php

    $nome = $_GET['nome'];
    $notaUm = $_GET['notaUm'];
    $notaDois = $_GET['notaDois'];
    $notaTres = $_GET['notaTres'];
    
	
	$mediaAluno = ($notaUm + $notaDois + $notaTres) / 3;
	
	echo $nome.", sua média é : ".$mediaAluno.".";
	
?>