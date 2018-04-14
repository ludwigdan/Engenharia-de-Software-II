<?php

$dsn = "mysql:host=localhost;dbname=ads";
$usuario = "root";
$senha = "root";

$bd = new PDO($dsn, $usuario, $senha);

//comando SQL
$insert = "INSERT INTO pessoa(nome, endereco, idade) "
        . " VALUES('Pedro Ortaca', 'Rua dos Pé Junto', 50)";

//Executando a instrução sql na base de dados
$query   = $bd->query($insert);

//verificando se a operação foi realizada
if($query) echo "Inserido com sucesso <br/>";
else echo "Erro ao cadastrar os dados, sql: " . $insert;
 
$delete = "DELETE FROM pessoa WHERE id=1";
$query = $bd->query($delete);
if($query) echo "Removido com sucesso";
else echo "Erro ao remover o registro";


$insert2 = "INSERT INTO pessoa(nome, endereco, idade) "
        . " VALUES(:nome, :endereco, :idade)";
$query = $bd->prepare($insert2);

$dados = array(
        'nome'=>"Billy", 
        'endereco'=>"PF",
        'idade' => 25
    );
$query->execute($dados);

//Busncado dados na base
$select = "SELECT * FROM pessoa";
$querySelect = $bd->query($select);

//mostrando os dados
while($linha = $querySelect->fetch()){
    echo $linha['id'] . ' - ' 
        . $linha['nome'] . ' - '
        . $linha['endereco'] . ' - '
        . $linha['idade'] . '</br>';
}
