<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Venture Pro</title>
    <style>
body {
    width: 100vw;
    height: 100vh;
    background-image: url("https://cdn.discordapp.com/attachments/1116192801412108288/1116505939609141248/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_4.png");
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Arial', sans-serif;
    font-size: 24px;
    font-style: italic;
    color: #333;
}

.cabecalho_dogventurepro {
    position: relative;
    width: 100%;
    height: 10.7%;
    background-color: #3E9AAB;
    border-radius: none;
    display: flex;
    flex-direction: column;
    border: 3px solid #F9B013;
    top: -45%;
    justify-content: space-between;
}

.logo_dogventure {
    position: absolute;
    height: 135%;
    width: 5px;
    display: flex;
    margin-top: 5px;
}

.botoes_dogventurepro {
    position: absolute;
    left: 25%;
    flex-direction: row;
    justify-content: center;
    display: flex;
    align-items: center;
    height: 100%;
    font-size: 20px;
}

.botoes_dogventurepro a {
    color: #fff;
    font-weight: bold;
    text-decoration: none;
    margin-right: 20px;
}

.botoes_dogventurepro a:hover {
    color: #F9B013;
    transition: color 0.5s;
}

#nome_dogventure {
    color: white;
    font-size: x-large;
    position: relative;
    left: 20%;
    margin-top: 10px;
}

.imagem_dogventure {
    position: relative;
    margin-top: 120px;
    border-bottom: 2px solid #F9B013;
}

.container_dogventure {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.caixa_dogventure {
    background-color: #616363;
    border-radius: 10px;
    display: inline-block;
    padding: 20px;
    border-radius: 5px;
    font-size: 20px;
    font-family: sans-serif;
    box-shadow: 0px 2px 20px 10px rgba(80,199,246,0.75);
    -webkit-box-shadow: 0px 2px 20px 10px rgba(80,199,246,0.75);
    -moz-box-shadow: 0px 2px 20px 10px rgba(80,199,246,0.75);
    all: unset;
}

.caixa_dogventure a {
    color: white;
    text-decoration: none;
}

.caixa_dogventure a:hover {
    color: black;
    transition: color 0.5s;
}

#todos_os_dogventure {
    color: white;
}

.texto_dog {
    left: 20px;
}

</style>
</head>
<body>
    <div class="cabecalho_dogventurepro">
        <nav class="botoes_dogventurepro">
            <a href="menu_inicial.php">Home</a>
            <a href="sobre_nos.php">Quem somos</a>
            <a href="login.php">Login</a>
            <a href="cadastrar.php">Cadastrar</a>
            <a href="animais_menu.php">Animais para adoção</a>
        </nav>

        <div class="logo_dogventure">
            <img src="img/Logo Petshop (1).png" alt="Logo Dogventure">
        </div>

        <center>
        <div class="imagem_dogventure">
            <img src="img/banner_inicial.png" alt="Banner inicial">
             <!-- width="820" height="400" -->
        </div>
        </center>
        
        <div class="container_dogventure">
            <div class="caixa_dogventure">
           
            <?php
            // Incluir o arquivo de conexão com o banco de dados
            require_once "conexao.php";
            
            // Fechar a conexão com o banco de dados
            mysqli_close($conexao);
            ?> 
            </div>
        </div>

<footer>
        <p>&copy; 2023 Dog Venture pro. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
