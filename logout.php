<?php
//arquivo logout
SESSION_START();//Recupero a sessão
unset($_SESSION['login']);//remove as definições das variáveis aplicadas
unset($_SESSION['password']);
header('location:index.php');
?>