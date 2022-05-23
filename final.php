<!DOCTYPE html>
<html>
<head>
	<title>Loja Tactical Vehicles - Obrigado</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="js/jquery.js"></script>
</head>
<body>
	<div id="conteudo">
	<h2>Dados do produto</h2>
	<form action="obrigado.php" method="post">
	<?php 
	session_start();
	//print_r($_SESSION["carrinholista"]);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$nb = "tacticalvehicles";
		//↓create connection
	$conn = new mysqli($servername, $username, $password, $nb);
	//↓check connection
	if($conn->connect_error) {
		echo "Banco não encontrado";
		echo "<br>";
		die();

	}
	$login = $_SESSION["login"];
	if($login == ""){
		echo"<script>javascript:alert('Faça Login para continuar!');
	javascript:window.location='index.php';
	</script>";
	}
	if($login == "Logar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."<br><a class='sair' href='index.php'>Logout</a></p>";
	}
	if($login == "Cadastrar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."<br><a class='sair' href='index.php'>Logout</a></p>";
	}
	if($login == "voltar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."<br><a class='sair' href='index.php'>Logout</a></p>";
	}

	$total = 0;
	$carrinhovazio = 0;
	for ($i = 0; $i < count($_SESSION["carrinholista"]); $i += 5) {

		if ($_SESSION["carrinholista"][$i] != "") {
		$carrinhovazio += 1;
		echo "<p><img src='".$_SESSION["carrinholista"][$i+1]."' width='300px'><br> 
		      Nome:".$_SESSION["carrinholista"][$i]."<br>
		      Preço: R$ ".$_SESSION["carrinholista"][$i+2]."<br>
		      Quantidade: ".$_SESSION["carrinholista"][$i+3]."</p>";
		      $total += $_SESSION["carrinholista"][$i+3] * $_SESSION["carrinholista"][$i+2];
		      echo "<input type='hidden' name='deleteitem' value='".$_SESSION["carrinholista"][$i]."'>";
		      
		}
	}		
	if($carrinhovazio == 0){
		echo "<h2>Carrinho vazio volte e adicione algum produto!!!</h2>";
		echo "</form>";
 		echo "<form action='produtos.php' method='post'>";
		if($login == "Logar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Voltar'></p>";
		}
		if($login == "Cadastrar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Voltar'></p>";
		}
		if($login == "voltar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Voltar'></p>";
		}
		echo "</form>";
	}
	else {echo "<h2>TOTAL: R$ ".$total."</h2>";
	 echo "<p><input type='hidden' name='total value='".$total."'></p>";

	
	echo "<h2>Seus dados</h2>";
	 $sql3 = "SELECT * from clientes where cpf =".$_SESSION["cpf"].";";
	 $result = $conn->query($sql3);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				echo "<p class='.dados'>Nome:".$row["nome"]."<br>
				Endereço:".$row["endereco"]."<br>
				CPF:".$row["cpf"];
			}
		}
	echo "<p><input type='submit' name='Finalizar Compra' value='Finalizar Compra'></p>";
	echo "</form>";
 	echo "<form action='carrinho.php' method='post'>";

		if($login == "Logar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Voltar'></p>";
		}
		if($login == "Cadastrar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Voltar'></p>";
		}
		if($login == "voltar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Voltar'></p>";
		}
		echo "</form>";
}	
	?>

	
</div>
</body>
</html>