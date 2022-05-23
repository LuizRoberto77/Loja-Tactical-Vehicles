<?php 
session_start(); 
session_destroy()

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Loja Tactical Vehicles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="js/jquery.js"></script>
</head>
<body>
	
	<div id="conteudo">
	<h1>Loja Tactical Vehicles</h1>
	<p><img src="imagens/tank-ini.png" width="700px"><br> 
	Criada em 2018 a Loja Tactical Vehicles especializada na venda e entrega de blindados com o objetivo de entregar sempre o melhor serviço e produto  para o cliente.</p>

	<form action="produtos.php" method="post">
		<p>Email: <input type="email" name="email" placeholder="Digite Seu Email" required></p>
		<p>Senha: <input type="password" name="senha" placeholder="Digite Sua Senha" required></p>
		<p><input type="submit" name="login" value="Logar"></p>
		
	</form>
	<p>Se não é cadastrado em nosso site <a href="cadastro.html">Clique Aqui</a></p>
</body>
</html>