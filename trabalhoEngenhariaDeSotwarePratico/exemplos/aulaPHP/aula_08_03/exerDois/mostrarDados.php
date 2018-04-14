<?php

    $tipoMoeda = $_GET['tipoMoeda'];

    $valorEntrada = $_GET['valorReal'];
    
    if($tipoMoeda == 'real'){
        $valorConvertido = $valorEntrada / 3.79;
        $descTipoMoeda = 'Reais';
        $convertidoPara = 'Dolar';
    }else{
        $valorConvertido = $valorEntrada * 3.79;
        $descTipoMoeda = 'Dolares';
        $convertidoPara = 'Reais';
    }
        
    echo "O valor ".$valorEntrada.", em ".$descTipoMoeda.", convertido para ".$convertidoPara." é: ".$valorConvertido;
    
?>