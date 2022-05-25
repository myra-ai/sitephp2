<img src="imagens/logo2.png" class="logo"/>
<?php
include "connect.php";
SESSION_START();
@$email = $_SESSION['login']; //recupera sessão ->almeidamyrelalima@gmail.com
@$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$email'");
while($line = mysqli_fetch_array($sql)){
	$nivel = $line['nivel'];
}

if(@$nivel == 1) {
	echo "<a href = logout.php class=links_top > Sair</a>";
    echo "<a href = adm.php class=links_top>Ir para adm</a>";

} else if(@$nivel =="")  { //desconectado da conta
    echo "<a href = login.php class=links_top >Logar</a>";
    echo "<a href = form_cadastro.php class=links_top>Cadastre-se</a>"	;
} else { //nivel diferente de 1
	echo "<a href = logout.php class=links_top > Sair</a>";
    echo "<a href = cliente.php class=links_top>Ir para cliente</a>";
}

?>
