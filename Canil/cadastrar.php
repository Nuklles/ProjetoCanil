<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f6be23;
		}
		#form{
			display:flex;
			align-items: center;
			justify-content: center;
		}
		h1 {
			text-align: center;
			font-size: 36px;
			color: #333;
			margin-top: 30px;
		}
		ul {
			border-radius: 10px;
			padding: 20px;
			box-shadow: 0 20px 50px rgba(10, 20, 30, 0.1);
			max-width: 300px;
			width: 100%;
			text-align: center;
			background-color: #3E9AAB;
			display:flex;
			justify-content:center;
			align-items:center;
			flex-direction:column;
			gap:15px;
		}
		li {
			display: table-row;
			background-color: #FFC041;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
			transition: all 0.2s ease-in-out;
			transform:scale(0.9);	
		}
		li:hover {
			transform: scale(1.05);
			box-shadow: 0 5px 15px rgba(0,0,0,0.2);
		}
		a {
			border-radius:10px;
			display: table-cell;
			vertical-align: middle;
			padding: 15px;
			color: #000000; /* Altere a cor do texto para preto */
			text-decoration: none;
			font-size: 24px;
		}
		#menu-background {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: -1;
			background-image: url("https://cdn.discordapp.com/attachments/968520924087328771/1114612833943048212/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
			background-size: cover;
			background-repeat: no-repeat;
			filter: brightness(85%); 
		}
		#back-link {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #FFC041;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
			transition: all 0.2s ease-in-out;
			transform: scale(0.9);
			margin-top: 10px;
			max-width: 350px;
			margin: 10px auto;
		}
		#back-link:hover {
			transform: scale(1.05);
			box-shadow: 0 5px 15px rgba(0,0,0,0.2);
		}
		#back-link a {
			color: #000000;
			text-decoration: none;
			font-size: 24px;
			padding: 10px 20px; 
		}
		
	</style>
</head>
<body>
	<div id="menu-background"></div>
	<h1>Cadastrar novo usuário</h1>
	<div id="form">
		<ul>
			<li>
				<a href="cadastrar_usuario.php">Cadastrar Pessoa Fisica</a>
			</li>
			<li>
				<a href="cadastrar_empresa.php">Cadastrar Pessoa Jurídica</a>
			</li>
		</ul>
	</div>
	
	<div id="back-link">
		<a href="index.php">Voltar para o Menu Principal</a>
	</div>
</body>
</html>
