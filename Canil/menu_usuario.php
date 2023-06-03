<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #42DAF5;
            margin: 0;
            padding: 0;
        }
        
        .container {
            display: flex;
            height: 100vh;
        }
        
        .background-image {
            background-image: url("https://cdn.discordapp.com/attachments/968520978227408906/1114345234474733680/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_2.png");
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            flex: 1;
        }
        
        .sidebar {
            background-color: #333;
            color: #fff;
            width: 290px;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .sidebar li a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            position: relative;
            z-index: 1;
            transition: color 0.3s ease-in-out;
        }

        .sidebar li a:hover {
            color: #FFD700;
        }

        .sidebar li .emoji {
            margin-right: 10px;
            font-size: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar li a:hover .emoji {
            transform: scale(1.2);
        }

        .sidebar li a:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            opacity: 0.4;
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <h1>Seja bem vindo (a)</h1>
                <li><a href="editar_perfil.php"><span class="emoji">&#128100;</span>Editar perfil</a></li>
                <li><a href="gerenciador_posteres.php"><span class="emoji">&#128218;</span>Gerenciador de posteres</a></li>
                <li><a href="inserir_poster.php"><span class="emoji">&#128073;</span>Inserir poster</a></li>
                <li><a href="adotar_pet.php"><span class="emoji">&#128054;</span>Adotar pet</a></li>
                <li><a href="encaminhar_pet.php"><span class="emoji">&#128062;</span>Encaminhar pet para um canil</a></li>
                <li><a href="sair.php"><span class="emoji">&#128682;</span>Sair</a></li>
            </ul>
        </div>
        <div class="background-image"></div>
    </div>
</body>
</html>

