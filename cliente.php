<?php
include "connect.php";
SESSION_START();//recupera sessão em aberto ou inicia
$login = $_SESSION['login']; //recupera login
$senha_log = $_SESSION['password'];
$sql = mysqli_query($link,"SELECT * FROM tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)){
$senha = $line['senha'];
$nivel = $line['nivel'];
$foto = $line['foto'];
$id = $line['id_user'];
$nome = $line['nome'];
}
if($senha_log == $senha && $nivel > 1){

}else{
	header('location:index.php'); //volta pra tela inicial
}
?>
<html lang = "pt-br">
  <head>
    <meta charset="utf-8">
    <title>Primeiro exemplo php</title>
 <link rel ="stylesheet" type = "text/css" href="formato.css">
 </head>
  <body>
  <div id="box_form">
  <h1 style="margin-left:2%" > Usuário logado como: <?php echo $login ?> </h1>
  <h1 style="margin-left:2%" > Nome do usuário: <?php echo $nome ?> </h1>
  <a href="index.php"style="margin-left:2%">Ir para home </a> | <a href="logout.php">Sair</a>
  <img src="<?php echo "user/user$id/$foto";?>" style="float:right; width:120px; height:auto; margin:-20px 5px 0 0;">

  </div>
</body>
</html>