<?php
session_start();
include('validar_usuario.php');
include('conexao.php');
$email = $_SESSION['email'];

$select = "SELECT email FROM login WHERE email = '$email'";
$query = mysqli_query($conexao, $select);
$dado = mysqli_fetch_row($query);
echo $dado[0];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		h1 {
			text-align: center;
			font-size: 36px;
			color: #333;
			margin-top: 30px;
		}
		ul {
			list-style: none;
			padding: 0;
			margin: 50px auto;
			display: table;
		}
		li {
			display: table-row;
			margin-bottom: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
			transition: all 0.2s ease-in-out;
		}
		li:hover {
			transform: scale(1.05);
			box-shadow: 0 5px 15px rgba(0,0,0,0.2);
		}
		a {
			display: table-cell;
			vertical-align: middle;
			padding: 20px;
			color: #333;
			text-decoration: none;
			font-size: 24px;
		}
		a:hover {
			color: #0077b5;
			text-decoration: underline;
		}
		.logout {
			display: block;
			margin: 0 auto;
			text-align: center;
			font-size: 18px;
			color: #999;
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<h1>Menu empresa</h1>
	
	<li><a href="editar_cadastro_empresa.php">Editar cadastro</a></li>
	<li><a href="gerenciador_posteres_empresa.php">Gerenciador de posteres</a></li>
	<li><a href="inserir_poster_empresa.php">Inserir poster</a></li>
	<li><a href="ver_formularios.php">formularios recebidos</a></li>
	
	
    <div class="logout"><a href="sair.php">Sair</a></div>
</body>
</html>