<?php

//arquivo de conexão com o banco
//mysql_connect - antes
//mysqli_connect
$host = "localhost"; //estamos guardando em um host local
$user = "root"; //nome do usuário pra acessar o banco
$pass ="";
$db = "db_sitephp"; //nome do banco de dados

$link = mysqli_connect($host, $user,$pass, $db );//conexão, local, usuario, senha e nome do banco de dados



?>