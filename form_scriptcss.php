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
}
if($senha_log == $senha && $nivel == 1){

}else{
	header('location:index.php'); //volta pra tela inicial
}

//só vai permanecer se estiver logada
?> 

<html lang = "pt-br">
  <head>
    <meta charset="utf-8">
    <title>Primeiro exemplo php</title>
 <link rel ="stylesheet" type = "text/css" href="formato.css">
 </head>
  <body>
  <div id="box_form">
  <h1 style="margin-left:10%" > Formulário de script css </h1>
  <form action="postar_script.php" method="POST" enctype="multipart/form-data"><!-- passar arquivos precisa disso -->

  <input type="text" name="titulo" class="campos_cad" placeholder="Digite o título da postagem">
  <input type="file" name="foto" class="campos_cad">
  <textarea name="conteudo" class="campos_cad" placeholder="Digite aqui o conteudo até 300c..." style="height:200px" maxlength="300"> </textarea>
  <div class="botoes">
  <input type="submit" value="Publicar" class="bt_cad">
  <input type="reset"  value="Limpar" class="bt_cad">
  </div>
  </form>
  <div class="botoes">
  <a href="index.php" class="form_link"> &larr; Voltar para a página principal </a>  <!-- flechinha apontado pra esquerda-->
    <a href="form_postar.php" class="form_link" style="margin-left:20px"> Ir para form postar &rarr;  </a>
  </div>
</body>
</html>
</html>