
<html lang = "pt-br">
  <head>
    <meta charset="utf-8">
    <title>Primeiro exemplo php</title>
 <link rel ="stylesheet" type = "text/css" href="formato.css">
 </head>
  <body>
  <div id="box_form">
  <h1 style="margin-left:10%" > Tela de login </h1>
  
    <?php
 @$v = $_GET['valor']; //@ -> será pra evitar erro, pela variavel está vazia
  if($v==true){
    echo "<span style='color:red'>Todos os campos devem ser preenchidos</span>";
  }
  ?>
  <form action="logar.php" method="POST" enctype="multipart/form-data"><!-- passar arquivos precisa disso -->

  <input type="email" name="email" class="campos_cad" placeholder="Email">
  <input type="password" name="senha" class="campos_cad" placeholder="Senha">
  
  <div class="botoes">
  <input type="submit" value="Logar" class="bt_cad">
  <input type="reset"  value="Limpar" class="bt_cad">
  </div>
  </form>
  <div class="botoes">
  <a href="index.php" class="form_link"> &larr; Voltar para a página principal </a> <!-- flecdinha apontado pra esquerda-->
  <p class="p_form"> Aindo não possui cadastro? Então clique  no link abaixo para fazer o cadastro </p>
  <a href="form_cadastro.php" class="form_link"> Cadastrar-se </a>
  </div>
</body>
</html>