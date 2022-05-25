<?php
include "connect.php";
date_default_timezone_set('America/Sao_Paulo');//ajtr o horário

SESSION_START();//recupera sessão em aberto ou inicia
$login = $_SESSION['login']; //recupera login
$senha_log = $_SESSION['password'];
$sql = mysqli_query($link,"SELECT * FROM tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)){
$senha = $line['senha'];
$nivel = $line['nivel'];
$id_user = $line['id_user'];
}
if($senha_log == $senha && $nivel == 1){
$titulo = $_POST['titulo'];
$foto = $_FILES['foto']['name'];
$tipo = $_FILES['foto']['type'];
$conteudo = $_POST['conteudo'];

//echo $foto."<br>";
$foto = str_replace(" ","_", $foto); //substituindo espaço em branco  por _
// guardando na mesma variavel, pois vai ser mudado o nome
//começa com 1, porque zero é automaticamente 0

$foto = str_replace("â", "a", $foto);
$foto = str_replace("é","e", $foto);
$foto = str_replace("ç","c", $foto);

//passando para minusculas
$foto = strtolower($foto);
//echo $foto."<br>";
$registro = false;
if($titulo != "" && $foto != "" && $conteudo != ""){
	$registro = true;
}else{
	echo "<script>window.history.go(-1)</script>";
}

$sql = mysqli_query($link, "SELECT * FROM tb_postagens order by id_post desc limit 1");
while($line = mysqli_fetch_array($sql)){
	@$id = $line['id_post'];
}

if($registro == true){
@$id = $id+1;
echo "id:$id"; 
$pasta = "postagens/post$id";
//echo $pasta;

if(file_exists($pasta)) {
	echo "Pasta já existe";
} else{
mkdir($pasta, 0777);
//echo "pasta criada";
}
$dt = date('Y-m-d');
$hr = date('H-i-s');
$page = 1;	
mysqli_query($link, "INSERT INTO tb_postagens(titulo, imagem, texto, dt, hr, page, id_user) VALUES
('$titulo','$foto', '$conteudo','$dt', '$hr', '$page', '$id_user') ");
move_uploaded_file($_FILES['foto']['tmp_name'],$pasta."/".$foto);
header('location:form_postar.php');
} else {
	echo "Não foi possível cadastrar esse conteudo";
	echo "<a href=form_postar.php> Voltar ao formulário</a>";
}


} else {
	header('location:index.php');
}

?>