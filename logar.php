<?php
//arquivo logar.php
include "connect.php";
$email = $_POST['email'];
$senha = $_POST['senha'];

if($email != "" && $senha !=""){
//	echo "Usuário está logado";
$sql = mysqli_query($link, "SELECT * FROM tb_user where email = '$email'");//só vai encontrar as informações do email citado
$registro = mysqli_num_rows($sql); // verifica quantas linhas foram encontradas
//echo $registro;
 while($line = mysqli_fetch_array($sql)){ //salva as informações dadas no query
	$senha_user = $line['senha']; // pegar a senha cadastrada
	$nivel = $line['nivel'];
 }
 
		if($registro == true){
				if($senha_user == $senha){// senha do banco de dados for = a senha que vc colocou
				session_start(); //ficar no logado no site
				$_SESSION['login'] = $email; //pode colocar qlr nome
				$_SESSION['password'] = $senha;
					if($nivel == 1){
					header('location:adm.php');//aparece na  url
					} else {
					header('location:cliente.php'); 
					}
			
				} else{
				echo "Senha não confere com o que tem no cadastro";
				echo "<a href ='login.php'> Voltar  a tela de login</a>";
				}
		}else {
	       echo "Você não possui cadastro. Deseja se cadastrar?";
		   echo "<a href ='form_cadastro.php'> Cadastra-se</a>";
		}
}else{
	header('location:login.php?valor=1');//fica na url e é pego pelo get no login.php
}



?>