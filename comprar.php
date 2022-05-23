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
	$prod = $_POST["comprar"];
	$login = $_SESSION["login"];
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

	

	if($prod == "Comprar Tanque personalizado Metal Slug"){
		$cod = $_POST["cod1"];
		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$preco = $row["PRECOPROD"];
			}

		}
 		echo "<p><img src='imagens/tank-ms.jpg' width='500px'><br>
		Tanque personalizado Metal Slug<br>
		Preço: ".$preco."<br>
		<input type='hidden' name='prod' value='ms'></p>";
		;
 	}else
 	if($prod == "Comprar Tanque M1 Abrams"){
 		$cod = $_POST["cod2"];
 		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$preco = $row["PRECOPROD"];
			}
		}	
 		echo "<p><img src='imagens/tank-ma.jpg' width='500px'><br>
		Tanque M1 Abrams<br>
		Preço: ".$preco."<br>
		<input type='hidden' name='prod' value='ma'></p>";
		;
 	}else
 	if($prod == "Comprar M1116 Humvee Up-Armored"){
 		$cod = $_POST["cod3"];
 		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$preco = $row["PRECOPROD"];
			}
		}
 		echo "<p><img src='imagens/vehicle-ha.jpg' width='500px'><br>
		M1116 Humvee Up-Armored<br>
		Preço: ".$preco."<br>
		<input type='hidden' name='prod' value='ha'></p>";
		;
 	}else
 	if($prod == "Comprar Tanque HVY APC"){
 		$cod = $_POST["cod4"];
 		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$preco = $row["PRECOPROD"];
			}
		}
 		echo "<p><img src='imagens/tank-ha.jpg' width='500px'><br>
		Tanque HVY APC<br>
		Preço: ".$preco."<br>
		<input type='hidden' name='prod' value='hyv'></p>";
		;
	}else
	if($prod == "Comprar MH-6/AH-6 Little Bird Marine"){
		$cod = $_POST["cod5"];
		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$preco = $row["PRECOPROD"];
			}
		}
 		echo "<p><img src='imagens/air-lb.jpg' width='500px'><br>
		MH-6/AH-6 Little Bird Marine<br>
		Preço: ".$preco."<br>
		<input type='hidden' name='prod' value='lb'></p>";
		
 	}
 	

 	echo "<p>Quantidade:<select name='qtd'>";
 		$x = 1;
 		$sql = "SELECT QUANTIDADEPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		
 		$result = $conn->query($sql);
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
	echo "<p><input type='submit' value='Colocar no Carrinho'><p>";	

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
 	</form>
</body>
</html>