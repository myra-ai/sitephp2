<div id="conteudo_principal">
<h1 class="titulos"> Páginas de Scripts CSS</h1>
<?php
include "connect.php";
$sql = mysqli_query($link,"select * from tb_postagens where page = 2 order by id_post desc");
	while($line = mysqli_fetch_array($sql)){
		$titulo = $line['titulo'];
		$imagem = $line['imagem'];
		$conteudo = $line['texto'];
		$data = $line['dt'];
		$id_post = $line['id_post'];
		$hora = $line['hr'];

?>
   <div class = "postagens">
     <h1 class="titulos"> <?php echo $titulo; ?></h1>
	 <img src="postagens/<?php echo "post".$id_post."/". $imagem ?>" class="imagem">
	 <!-- postagens/post1/myra.pnh -->
	 <p class="paragrafo"> <?php echo $conteudo; ?></p>
	 <span class="data"> <?php echo date('d/m/Y', strtotime($data)); ?> </span>
   </div>
   
  <?php
	}
   ?>  
</div>


<div id="recentes">
     <h1 class="titulos">Recentes </h1>
<div class="postagens_recentes">
<?php
$contar = 0;
$sql = mysqli_query($link,"select * from tb_postagens where page = 2 order by id_post desc");
	while($line = mysqli_fetch_array($sql) and $contar < 2){
    	$titulo = $line['titulo'];
	    $data = $line['dt'];
	
?>
 <h1 class="titulos"><a href="#"> <?php echo $titulo;   ?></a></h1>
  <span class="data" style="margin-top:-10px"> <?php echo date('d/m/Y', strtotime($data)); ?> </span>
  
  <?php
  $contar ++;
	}
	
	?>

</div>
</div>