<!DOCTYPE html>	
<html lang="pt-br">
<head>
	<title>Loja Tactical Vehicles - Dados</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div id="conteudo">
	<h1>Loja Tactical Vehicles - Dados</h1>
	<h2>Dados do produto</h2>

	<form action="final.php" method="post">
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
	$prod = $_POST["prod"];
	$qtd = $_POST["qtd"];
	$cod = $_POST["cod"];

	$login = $_SESSION["login"];
	if($login == ""){
		echo"<script>javascript:alert('Faça Login para continuar!');
	javascript:window.location='index.php';
	</script>";
	;
	}
	if($login == "Logar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]." </p>";
	}
	if($login == "Cadastrar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]." </p>";
	}
	if($login == "voltar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]." </p>";
	}

	if($prod == "ms"){
		
		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$precoa = $row["PRECOPROD"];
				$preco = $row["PRECOPROD"] * $qtd;
			}
		}	
 		echo "<p><img src='imagens/tank-ms.jpg' width='500px'><br>
		Tanque personalizado Metal Slug<br>
		Preço: ".$precoa."<br>
		Quantidade: ".$qtd." Unidade(s)<br>
		TOTAL: R$ ".$preco."<br>
		<input type='hidden' name='prod' value='ms'></p>";
 	}else
 	if($prod == "ma"){
 		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$precoa = $row["PRECOPROD"];
				$preco = $row["PRECOPROD"] * $qtd;
			}
		}	
 		echo "<p><img src='imagens/tank-ma.jpg' width='500px'><br>
 		Tanque M1 Abrams<br>
		Preço: ".$precoa."<br>
		Quantidade: ".$qtd." Unidade(s)<br>
		TOTAL: R$ ".$preco."<br>
		<input type='hidden' name='prod' value='ma'></p>";
 	}else
 	if($prod == "ha"){
 		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$precoa = $row["PRECOPROD"];
				$preco = $row["PRECOPROD"] * $qtd;
			}
		}	
 		echo "<p><img src='imagens/vehicle-ha.jpg' width='500px'><br>
		M1116 Humvee Up-Armored<br>
		Preço: ".$precoa."<br>
		Quantidade: ".$qtd." Unidade(s)<br>
		TOTAL: R$ ".$preco."<br>
		<input type='hidden' name='prod' value='ha'></p>";
 	}else
 	if($prod == "hyv"){
 		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$precoa = $row["PRECOPROD"];
				$preco = $row["PRECOPROD"] * $qtd;
			}
		}	
 		echo "<p><img src='imagens/air-lb.jpg' width='500px'><br>
		Tanque HVY APC<br>
		Preço: ".$precoa."<br>
		Quantidade: ".$qtd." Unidade(s)<br>
		TOTAL: R$ ".$preco."<br>
		<input type='hidden' name='prod' value='hyv'></p>";
	}else
	if($prod == "lb"){
		$sql = "SELECT PRECOPROD from PRODUTOS WHERE CODIGOPROD =".$cod;
 		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$precoa = $row["PRECOPROD"];
				$preco = $row["PRECOPROD"] * $qtd;
			}
		}	
 		echo "<p>
		MH-6/AH-6 Little Bird Marine<br>
		Preço: ".$precoa."<br>
		Quantidade: ".$qtd." Unidade(s)<br>
		TOTAL: R$ ".$preco."<br>
		<input type='hidden' name='prod' value='lb'></p>";	
	}
	echo "<input type='hidden' name='cod' value='".$cod."' >";
	echo "<input type='hidden' name='qtd' value='".$qtd."' >";
	echo "<input type='hidden' name='total' value='".$preco."' >";
	?>
	<h2>Seus dados</h2>


	<p><input type="submit" name="Confirmar Dados" value="Confirmar Dados"></p>
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
</div>
</body>
</html>