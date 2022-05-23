<!DOCTYPE html>
<html>
<head>
	<title>Loja Tactical Vehicles - Carrinho</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="js/jquery.js"></script>
</head>
<body>
	<div id="conteudo">
	
	<h1>Loja Tactical Vehicles - Carrinho</h1>
	
	<?php 
	ini_set('display_errors', 0);
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

	$qtd = $_POST["qtd"];
	$cod = $_SESSION["cod"];
	$login = $_SESSION["login"];
	$carrinho = $_POST["carrinho"];
	if($login == ""){
		echo"<script>javascript:alert('Faça Login para continuar!');
	javascript:window.location='index.php';
	</script>";
	;
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

	$carrinhovazio = 0;
	if (isset($_POST["carrinho"])) {
				if (empty($_SESSION["carrinholista"])) {
					$_SESSION["carrinholista"] = array();
				}
				
				if (in_array($_POST["nomeprod"], $_SESSION['carrinholista'])) {
				   $key = array_search($_POST["nomeprod"], $_SESSION['carrinholista']) + 3;
				   $_SESSION['carrinholista'][$key] = $_POST["qtd"];
				}
				else{
				    array_push($_SESSION["carrinholista"], $_POST["nomeprod"], $_POST["img"], $_POST["preco"], $_POST["qtd"], $_POST["cod"]);
				}

		}
	$total = 0;
	for ($i = 0; $i < count($_SESSION["carrinholista"]); $i += 5) {

		if ($_SESSION["carrinholista"][$i] != "") {

		$carrinhovazio += 1;
		echo "<form action='carrinho.php' method='post'>";
		echo "<p><img src='".$_SESSION["carrinholista"][$i+1]."' width='300px'><br> 
		      Nome:".$_SESSION["carrinholista"][$i]."<br>
		      Preço: R$ ".$_SESSION["carrinholista"][$i+2]."<br>
		      Quantidade: ".$_SESSION["carrinholista"][$i+3]."</p>";
		      $total += $_SESSION["carrinholista"][$i+3] * $_SESSION["carrinholista"][$i+2];
		      echo "<input type='hidden' name='deleteitem' value='".$_SESSION["carrinholista"][$i]."'>";
		      
		}
	}	
	if($carrinhovazio == 1){
		echo "<p><input type='submit' value='Remover'  name='deletar'></p>";

	}
	if($carrinhovazio > 1){
		echo "<p><input type='submit' value='Remover Último Item'  name='deletar'></p>";
	}
	
	 
		     
	if (isset($_POST["deletar"])) {

			$delete = array_search($_POST["deleteitem"], $_SESSION["carrinholista"]);
			$_SESSION["carrinholista"][$delete] = "";
			$_SESSION["carrinholista"][$delete+1] = "";
			$_SESSION["carrinholista"][$delete+2] = "";
			$_SESSION["carrinholista"][$delete+3] = "";
			$_SESSION["carrinholista"][$delete+4] = "";
			$carrinhovazio -= 1;
			$delete = 0;

			 echo "<meta http-equiv='refresh' content='0'>";
		}
	if($carrinhovazio == 0){
		echo "<p>Carrinho vazio</p><br><br>";
	}else{
		echo "<h2>TOTAL: R$ ".$total."</h2>";
	}
	echo "</form>";
	echo "<form action='final.php' method='post'>";
	
	?>
	<p><input type="submit" name="Terminar compra" value="Finalizar Compra"></p>
	</form>
	<form action="produtos.php" method="post">
 		<?php
		if($login == "Logar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Continuar Comprando''></p>";
		}
		if($login == "Cadastrar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Continuar Comprando''></p>";
		}
		if($login == "voltar"){
			echo "<input type='hidden' name='login' value='voltar'></p>";
			echo "<p><input type='submit' value='Continuar Comprando'></p>";
		}
 		?>
 	</form>	
</body>
</html>