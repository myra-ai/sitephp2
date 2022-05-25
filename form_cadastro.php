
<html lang = "pt-br">
  <head>
    <meta charset="utf-8">
    <title>Primeiro exemplo php</title>
 <link rel ="stylesheet" type = "text/css" href="formato.css">
 </head>
  <body>
  <div id="box_form">
  <h1 style="margin-left:10%" > Cadastre-se </h1>
  <form action="cadastrar.php" method="POST" enctype="multipart/form-data"><!-- passar arquivos precisa disso -->
  <input type="text" name="nome" class="campos_cad" placeholder="Nome">
  <input type="email" name="email" class="campos_cad" placeholder="Email">
  <input type="password" name="senha" class="campos_cad" placeholder="Senha">
  <input type="password" name="repetesenha" class="campos_cad" placeholder="Confirmar senha">
  <input type="text" name="lembrete" class="campos_cad" placeholder="Lembrete">
  <input type="file" name="foto" class="campos_cad">
  <div class="botoes">
  <input type="submit" value="cadastrar" class="bt_cad">
  <input type="reset"  value="Limpar" class="bt_cad">
  </div>
  </form>
  <div class="botoes">
  <a href="index.php" class="form_link"> &larr; Voltar para a página principal </a> <!-- flecdinha apontado pra esquerda-->
  <p class="p_form"> Já possui cadastro? Então clique  no link abaixo para fazer o login </p>
  <a href="login.php" class="form_link"> Logar </a>
  </div>
</body>
</html>