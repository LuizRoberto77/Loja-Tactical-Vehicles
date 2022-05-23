<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Loja Tactical Vehicles - Confirmar Compra</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="js/jquery.js"></script>
</head>
<body>
	<div id="conteudo">
	<h1>Loja Tactical Vehicles - Confirmar Compra</h1>
	<form action="carrinho.php" method="post">
	<?php   
	session_start();
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
	$cod = $_POST["cod"];
	$_SESSION["cod"] = $cod;
	if($login == ""){
		echo"<script>javascript:alert('Faça Login para continuar!');
	javascript:window.location='index.php';
	</script>";
	;
	}
	if($login == "Logar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."/<button type='submit name='carrinho'  value='vcarrinho'>Carrinho</button><br><a class='sair' href='index.php'>Logout</a></p>";
	}
	if($login == "Cadastrar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."/<button type='submit name='carrinho'  value='vcarrinho'>Carrinho</button><br><a class='sair' href='index.php'>Logout</a></p>";
	}
	if($login == "voltar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."/<button type='submit name='carrinho'  value='vcarrinho'>Carrinho</button><br><a class='sair' href='index.php'>Logout</a></p>";
	}
	echo "</form>";
	echo "<form action='Carrinho.php' method='post'>";
	$sql = "SELECT NOMEPROD, PRECOPROD, IMAGEMPROD,QUANTIDADEPROD FROM PRODUTOS WHERE CODIGOPROD = ".$cod.";";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()){
		echo "<p><img src=' ".$row["IMAGEMPROD"]."' width='300px'><br> 
		      ".$row["NOMEPROD"]."<br>
		      Preço: R$ ".$row["PRECOPROD"].
		      "</p>";
		      echo "<input type='hidden' name='nomeprod' value='".$row["NOMEPROD"]."'></p>";
		      echo "<input type='hidden' name='preco' value='".$row["PRECOPROD"]."'></p>";
		      echo "<input type='hidden' name='img' value='".$row["IMAGEMPROD"]."'></p>";
		  }
	}
	
 	echo "<p>Quantidade:<select name='qtd'>";
 		$x = 1;
 		$sql2 = "SELECT QUANTIDADEPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql2);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
			$qtd = $row["QUANTIDADEPROD"];
	 			while($x <= $qtd){
					echo "<option value='".$x."'>".$x."</option>";
					$x += 1;
					}
				}
				echo "</select>";
				echo "<input type='hidden' name='cod' value='".$cod."'></p>";
			}
			
			//echo $sql;
	 echo "<p><button type='submit' name='carrinho' value='carrinho'>Comprar</button></p>";	
 	?>
 	</form>
 	<form action="produtos.php" method="post">
 		<?php
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
 		?>
 		<!-- <p><a href="produtos.php">Voltar</a></p> -->
 	</form>
</body>
</html>