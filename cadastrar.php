<?php
//arquivo de cadastro
include "connect.php";
date_default_timezone_set('America/Sao_Paulo');//ajtr o horário

$nome	  =	 $_POST['nome'];
$email    =	 $_POST['email'];
$senha    =	 $_POST['senha'];
$resenha  =	 $_POST['repetesenha'];
$lembrete =	 $_POST['lembrete'];
$foto	  =	 $_FILES['foto']['name']; // Pra nome é diferente e precisa colocar name pra pegar o nome do arquivo
$tipo     =  $_FILES['foto']['type']; // Pegar o tipo de email

/*
echo "Nome: $nome<br>";
echo "Email: $email <br>";
echo "Senha: $senha<br>";
echo "Repetição da senha:$resenha<br>";
echo "Lembrete: $lembrete<br>";
echo "Foto: $foto<br>";
echo "Tipo: $tipo<br>";
*/

$registro = false;

if($nome != "" && $email != "" && $senha != "" && $lembrete !="" && $foto != "" ) { //ou então $nome != "" ou então a empty que vê a mesma coisa !empty($nome),a variavel nome não está vazia
		if($senha != $resenha) {
		echo "<script>alert('Senhas diferentes'); window.history.go(-1); </script>"; //esse window history go pede pra voltar uma janela, assim que pedir pra  cadastrar em vez dele ir pra proxima pagina ele volta pro formulário
		} else {
		$registro = true; //habilitado a ter seu cadastro no banco de dados
		}
} else {
	echo "<script>alert('É necessário preencher todos os campos'); window.history.go(-1); </script>"; 
}

//conexão do php com a tabela
$sql = mysqli_query($link,"SELECT * FROM tb_user order by id_user desc limit 1"); // função para cadastrar alguém, atualização ou deletar algum registro e coloca o link da conexão no connect php
while($line = mysqli_fetch_array($sql)){ // enquanto a variavel line recebe da função mysql_fetch_array o que vier da nossa consulta 
	$id = $line['id_user']; //guardo o que tá dentro do id_user
	$email_user = $line['email'];
} 

@$id = $id + 1;
$pasta="user".$id;//user 4

if(file_exists("user/".$pasta)){ //se arquivo existe dentro da pasta user
	//echo"<script> alert('essa pasta já existe!');  </script> ";
	//rmdir($pasta); //deleta pasta
} else {
	mkdir("user/".$pasta, 0777); //criar pasta -> user 4; 077 é padrão dentro da pasta user
  //  echo "<script> alert('A pasta ".$pasta." foi criada com sucesso'); </script>";//dá erro, user 4 já existe //caso não exista cria a pasta
}

$formatos = array(1=>'image/png', 2=>'image/jpg', 3=>'image/jpeg', 4=> 'image/gif');//delimitei os tipos de imagens possíveis
//substituindo caracteres indesejados
//myra almeida
$foto = str_replace(" ","_", $foto); //substituindo espaço em branco  por _
// guardando na mesma variavel, pois vai ser mudado o nome
//começa com 1, porque zero é automaticamente 0

$foto = str_replace("â", "a", $foto);
$foto = str_replace("é","e", $foto);
$foto = str_replace("ç","c", $foto);

//passando para minusculas
$foto = strtolower($foto);// se tiver o nome do arquivo em maiusculo passa pra minusculo
$teste = array_search($tipo, $formatos); //procura por um tipo específico
//procura se o tipo colocado está em formatos
if($teste == true){
	move_uploaded_file($_FILES['foto']['tmp_name'],"user/".$pasta."/".$foto); // o nome do arquivo obtido pelo files e o segundo onde vamos colocar o arquivo; upload pode ser  feito
} else {
	echo "<script> alert('tipo de arquivo não suportado'); </script>";
}

$dt = date('Y-m-d');//ano, mes, dia
$hr = date('H:i:s');//hora, minuto e sgnd


if(@$registro == true && $email != $email_user){ //email tem que ser diferente do ultimo cadastado
	mysqli_query($link,"insert into tb_user(nome, email, senha,lembrete, foto, nivel, dt, hr) VALUES 
('$nome', '$email', '$senha', '$lembrete', '$foto',5, '$dt', '$hr'  )");
//echo "<script> alert('usuário cadastrado com sucesso'); window.location.href='index.php'; </script>";
echo "<p style='text-align:center; color:#333;padding:5px;'> Usuário cadastrado com sucesso!<br>";
echo "<a href='index.php' style='color:#59f'>Ir para home </a> | <a href='login.php' style='color:#59f'> Login</a>";
echo "</p>";
} else {
	echo "<script>window.history.go(-1)</script>";
}


?>