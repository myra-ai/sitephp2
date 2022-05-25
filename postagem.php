
<html lang = "pt-br">
  <head>
    <meta charset="utf-8">
    <title>Primeiro exemplo php</title>
 <link rel ="stylesheet" type = "text/css" href="formato.css">
 </head>
  <body>

  <div id="geral">
  <div id ="topo"> 
<?php
include "topo.php";
?>
  
  </div> 
<div id = "menu">
<?php 
include "menu.php";

 ?>

</div>

<div id = "conteudo">
<?php include "conteudo_postagem.php"; ?>
</div>

<div id="rodape">
<?php include "rodape.php"; ?>
</div> 
</div> <!--envolve todas as divs, div geral-->
  </body>
</html>
