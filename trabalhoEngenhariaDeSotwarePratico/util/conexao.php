<?php

//$dsn = "mysql:host=localhost;dbname=ads";
//$usuario = "root";
//$senha   = "root";

$dsn = "pgsql:host=localhost;dbname=tradi";
$usuario = "postgres";
$senha   = "masterkey";

$bd = new PDO($dsn, $usuario, $senha);
