<!DOCTYPE html>
<html>
<head>
	<title>Loja Tactical Vehicles - Produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="js/jquery.js"></script>
</head>
<body>
	<div>
	<h1>Loja Tactical Vehicles - Produtos</h1>
	
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
	$login = $_POST["login"];
	$_SESSION["login"] = $login;
	
	if($_SESSION["login"] == ""){
		echo"<script>javascript:alert('Faça Login para continuar!');
	javascript:window.location='index.php';
	</script>";
	}
	
	if($_SESSION["login"] == "Logar"){
		$email = $_POST["email"];
		$senha = $_POST["senha"];
		$sql = "SELECT cpf,nome FROM clientes where email = '".$email."' and senha = '".$senha."';";
		if ($conn->query($sql) == TRUE) {
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					$_SESSION["nome"] = $row["nome"];
					$_SESSION["cpf"] = $row["cpf"];
						echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."/<button type='submit name='carrinho' value='vcarrinho'>Carrinho</button><br><a class='sair' href='index.php'>Logout</a></p>";
					}
			}else{
			echo"<script>javascript:alert('Email ou Senha Incorretos!');
	javascript:window.location='index.php';
	</script>";
			
			}
				
			
		}	
	}
	if($_SESSION["login"] == "Cadastrar"){
		$senhac = $_POST['senhac'];
		$senha2c = $_POST['senha2c'];
		$emailc = $_POST['emailc'];
		$cpf = $_POST['cpf'];
		$nome = $_POST["nome"];
		$end = $_POST["end"];
		
		if($senhac != $senha2c){
			echo"<script>javascript:alert('Senha e contra-senha Diferentes!');
	javascript:window.location='cadastro.html';
	</script>";
		}

		$sql2 = "SELECT email FROM clientes where email = '".$emailc."';";
		if ($conn->query($sql2) == TRUE) {
			$result = $conn->query($sql2);
			if ($result->num_rows > 0) {
			echo"<script>javascript:alert('Email já Cadastrado!');
	javascript:window.location='cadastro.html';
	</script>";
			}	

		}
		$sql3 = "SELECT cpf FROM clientes where cpf = '".$cpf."';";
		if ($conn->query($sql2) == TRUE) {
			$result = $conn->query($sql3);
			if ($result->num_rows > 0) {
			echo"<script>javascript:alert('CPF já Cadastrado!');
	javascript:window.location='cadastro.html';
	</script>";
			}
		}
		$sql4 = "INSERT INTO CLIENTES VALUES (NULL,'".$nome."','".$emailc."','".$senhac."','".$end."',".$cpf.")";
		if ($conn->query($sql4) == TRUE) {
			echo"<script>javascript:alert('Cadastrado com sucesso!')
	</script>";
			$_SESSION["nome"] = $nome;
			$_SESSION["cpf"] = $cpf;
			echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."/<button type='submit name='carrinho'  value='vcarrinho'>Carrinho</button><br><a class='sair' href='index.php'>Logout</a></p>";
		}	
	}	
	if($login == "voltar"){
		echo "<p class='user'>Nome: ".$_SESSION["nome"]." | CPF: ".$_SESSION["cpf"]."/<button type='submit name='carrinho' value='vcarrinho'>Carrinho</button><br><a class='sair' href='index.php'>Logout</a></p>";
		$_SESSION["nome"] = $_SESSION["nome"];
		$_SESSION["cpf"] =$_SESSION["cpf"];
	}
	echo "</form>";
	echo "<form action='Comprar2.php' method='post'>";
				

	$sql8 = "SELECT CODIGOPROD, NOMEPROD, PRECOPROD, IMAGEMPROD,QUANTIDADEPROD FROM PRODUTOS";
	$result = $conn->query($sql8);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()){
		echo "<p><img src=' ".$row["IMAGEMPROD"]."' width='300px'><br> 
		      ".$row["NOMEPROD"]."<br>
		      Preço: R$ ".$row["PRECOPROD"].
		      "</p>";
		      if($row["QUANTIDADEPROD"] == 0){
		      	echo "<p><a href=''>Indisponível</a></p><br>";
		      }else{
		      	 echo "<p><button type='submit' name='cod' value=".$row["CODIGOPROD"].">Comprar</button></p>";
		    	//echo "<p><input type='submit' name='comprar' value='Comprar'></p><br>";
		      }
		  }
	}	  
	// <p><img src="imagens/tank-ms.jpg" width="300px"><br>
	// 	Tanque personalizado Metal Slug<br>
	// 	Preço: R$ 50000000<br>
	// 	<input type="submit" name="comprar" value="Comprar Metal slug">
	// </p>

	// <p><img src="imagens/tank-ma.jpg" width="300px"><br>
	// 	Tanque M1 Abrams<br>
	// 	Preço: R$ 30000000<br>
	// 	<input type="submit" name="comprar" value="Comprar M1 Abrams"> 
	// </p>
	// <p><img src="imagens/vehicle-ha.jpg" width="300px"><br>
	// 	M1116 Humvee Up-Armored<br>
	// 	Preço: R$ 5000000<br>
	// 	<input type="submit" name="comprar" value="Comprar M1116 Humvee">
	// </p>
	// <p><img src="imagens/tank-ha.jpg" width="300px"><br>
	// 	Tanque HVY APC<br>
	// 	Preço: R$ 20000000<br>
	// 	<input type="submit" name="comprar" value="Comprar HVY APC">
	// </p>
	// <p><img src="imagens/air-lb.jpg" width="300px"><br>
	// 	MH-6/AH-6 Little Bird Marine<br>
	// 	Preço: R$ 60000000<br>
	// 	<input type="submit" name="comprar" value="Comprar Little Bird">
	// </p>
	?>
	</form>
	

</div>
</body>
</html>