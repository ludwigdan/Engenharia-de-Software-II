<?php
    require_once './conexao.php';
    $update = 'Update pessoa set nome = :nome, idade = :idade, endereco = :endereco where id = :id';

    $dados = array(
        'id' => $_GET['id'],
        'nome' => $_POST['nome'],
        'idade' => $_POST['idade'],  
        'endereco' => $_POST['endereco']
    );
    
    $query = $bd->prepare($update);        
    $r = $query->execute($dados);
    
    if($r)        header('Location: listar.php');
    else echo 'Erro ao tentar alterar';
?>

