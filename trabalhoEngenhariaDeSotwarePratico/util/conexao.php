<?php

//$dsn = "mysql:host=localhost;dbname=ads";
//$usuario = "root";
//$senha   = "root";

$dsn = "pgsql:host=localhost;dbname=Tradi";
$usuario = "postgres";
$senha   = "hejbp2";

$bd = new PDO($dsn, $usuario, $senha);
