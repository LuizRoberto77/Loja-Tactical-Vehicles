<!DOCTYPE html>
<html>
<head>
	<title>Loja Tactical Vehicles - Obrigado</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<div id="conteudo">
	<h1>Obrigado pela compra</h1>
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
	$sql3 = "SELECT CODIGOVENDA From vendas order by CODIGOVENDA desc limit 1";
		if ($conn->query($sql3) == TRUE) {
		$result = $conn->query($sql3);
			if ($result->num_rows >= 0) {
				while($row = $result->fetch_assoc()){
			$ultc = $row["CODIGOVENDA"];		
			//echo "<p>OK2</p>";
			$ultc +=1;

	for ($i = 0; $i < count($_SESSION["carrinholista"]); $i += 5) {

		if ($_SESSION["carrinholista"][$i] != "") {
		$sql = "SELECT QUANTIDADEPROD from PRODUTOS WHERE CODIGOPROD =".$_SESSION["carrinholista"][$i+4];
	 		$result = $conn->query($sql);
			if ($result->num_rows >= 0) {
				while($row = $result->fetch_assoc()){
				$qtda = $row["QUANTIDADEPROD"];
				
				}
			}
			
			$qtde = $qtda - $_SESSION["carrinholista"][$i+3];
		$sql2 = "UPDATE `produtos` SET `quantidadeprod` = '".$qtde."' WHERE `produtos`.`codigoprod` =".$_SESSION["carrinholista"][$i+4].";";
		if ($conn->query($sql2) === TRUE) {
			//echo "<p>OK2</p>";
		}else{
			echo $sql2;
		}


		$sql4 = "INSERT INTO vendas VALUES (".$ultc.",now(),".$_SESSION["carrinholista"][$i+3].",".$_SESSION["carrinholista"][$i+4].",".$_SESSION["cpf"].");";
		if ($conn->query($sql4) == TRUE) {
			//echo "<p>OK3</p>";
		}else{
			echo $conn->error.$sql3;
		}
		$sql5 = "SELECT codigovenda FROM `vendas` ORDER BY `vendas`.`codigovenda` DESC limit 1";
		$result = $conn->query($sql5);
			if ($result->num_rows >= 0) {
				while($row = $result->fetch_assoc()){
				$codigovenda = $row["codigovenda"];
				}
			}
	      
		}
	}echo "<p>Número de pedido: ".$codigovenda."</p>";	
}
	}else{
		echo $sql3;}
}	
	?>
	<p><a href="index.php">Voltar ao Inicio</a></p>
	
</div>
</body>
</html>