<div id="conteudo_principal">
 <!--  <div class = "postagens">
     <h1 class="titulos"> Momentos Marcantes</h1>
	 <img src="imagens/postagem3.png" class="imagem">
	 <p class="paragrafo"> Parágrafo provisório...</p>
	 <span class="data"> 08/05/2022 </span>
   </div>
   
   <div class = "postagens">
     <h1 class="titulos"> Titulo da postagem</h1>
	 <img src="imagens/postagem2.png" class="imagem">
	 <p class="paragrafo"> Parágrafo provisório...</p>
	 <span class="data"> 08/05/2022 </span>
   </div>-->


<?php
include "connect.php";
$qtde_registros = 1;
@$page = $_GET['pag'];
if(!$page){
	$pagina = 1;
} else {
	$pagina = $page;
}


$inicio = $pagina - 1;//define o começo das nossas buscas
$inicio = $inicio * $qtde_registros;
$sel_pacial = mysqli_query($link, "select * from tb_postagens limit $inicio, $qtde_registros");
$sel_total = mysqli_query($link, "select * from tb_postagens");

$contar = mysqli_num_rows($sel_total); //qtd de registros da tabela
$contar_pages = $contar / $qtde_registros;
//echo $contar_pages;

while($line = mysqli_fetch_array($sel_pacial)){
$titulo = $line['titulo'];
		$imagem = $line['imagem'];
		$conteudo = $line['texto'];
		$data = $line['dt'];	
		$id_post = $line['id_post'];

?>
 <h1 class="titulos"> <?php echo $titulo; ?></h1>
 	 <img src="postagens/<?php echo "post".$id_post."/". $imagem ?>" class="imagem">
	 <p class="paragrafo"> <?php echo $conteudo; ?></p>
	 	 <span class="data"> <?php echo date('d/m/Y', strtotime($data)); ?> </span>
<?php
}

$anterior = $pagina - 1;
$proximo = $pagina + 1;
echo "<br><br>";

if($pagina > 1) {
	echo "<a href=?pag=$anterior>&larr; Anterior </a>";
}

for($i = 1; $i < $contar_pages + 1; $i++){
	echo "<a href=?pag=".$i.">".$i."</a>";
}

if($pagina < $contar_pages) {
	echo "<a href=?pag=$proximo> Próximo &rarr; </a>";
}
?>
</div>

<div id="recentes">
       <h1 class="titulos">Recentes </h1>
<div class="postagens_recentes">
<?php
$contar = 0;
$sql = mysqli_query($link,"select * from tb_postagens order by id_post desc");
	while($line = mysqli_fetch_array($sql) and $contar < 5){
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