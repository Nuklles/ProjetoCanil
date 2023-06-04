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
		
	</style>
</head>
<body>
	<h1>Cadastrar novo usuario</h1>
	
	<ul>
		<li><a href="cadastrar_usuario.php">Cadastrar Pessoa Fisica</a></li>
		<li><a href="cadastrar_empresa.php">Cadastrar Pessoa Jurídica</a></li>
        
		
		</ul>
        <a href="index.php">Voltar</a>
</body>
</html>
