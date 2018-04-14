<?php

    $nome = $_GET['nome'];
    $sexo = $_GET['sexo'];
    $peso = $_GET['peso'];
    $altura = $_GET['altura'];    
    
    $imc = $peso / ($altura * $altura);
    
    if($sexo == 'masculino'){
        $textoMostrar = 'Prezado '.$nome.",<br/>";
    }else{
        $textoMostrar = 'Prezada '.$nome.",<br/>";
    }
    
    $textoMostrar = $textoMostrar."<br/><p>Seu IMC é: ".round($imc,2).".<br/>";
    
    if($imc > 25){
        $textoMostrar = $textoMostrar."<br/><p> Você está acima do peso.";
    }else if($imc < 23){
        $textoMostrar = $textoMostrar."<br/><p> Você está abaixo do peso.";
    }else{
        $textoMostrar = $textoMostrar."<br/><p> Você está no seu peso ideal.";
    }
    
    echo $textoMostrar;
    
?>