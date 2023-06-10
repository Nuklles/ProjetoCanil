<!DOCTYPE html>
<html>
<head>
    <title>Pets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F2F2F2;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container  {
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .container img {
            max-height: 300px;
            max-width: 300px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .container p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .back-link {
            color: #FFFFFF;
            text-decoration: none;
            background-color: #FF9900;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #FFB03B;
        }
        

        
    </style>
</head>
<body>
    <a class="back-link" href="menu_usuario.php">Voltar</a>
    <br><br><br>

    <?php
    session_start();
    include('validar_usuario.php');
    include('conexao.php');
    $email = $_SESSION['email'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "canil";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "SELECT p.arquivo, p.nomepet, p.especie, p.porte, p.sexo, p.obs, u.email, u.telefone 
            FROM pets AS p
            INNER JOIN cadastro_usuario AS u ON p.id = u.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageData = $row['arquivo'];
            $nomePet = $row['nomepet'];
            //$especie = $row['especie'];
            //$porte = $row['porte'];
            //$sexo = $row['sexo'];
            //$obs = $row['obs'];
            //$email = $row['email'];
            //$telefone = $row['telefone'];

            echo '<div class="container">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
            echo '<p>Nome do pet: ' . $nomePet . '</p>';
            //echo '<p>Espécie: ' . $especie . '</p>';
            //echo '<p>Porte: ' . $porte . '</p>';
            //echo '<p>Sexo: ' . $sexo . '</p>';
            //echo '<p>Alguma observação? Doença? Deficiência?: ' . $obs . '</p>';
            //echo '<p>Email: ' . $email . '</p>';
            //echo '<p>Telefone para entrar em contato: ' . $telefone . '</p>';
            echo '</div>';
        }
    } else {
        echo "Nenhum pet encontrado.";
    }

    $conn->close();
    ?>
</body>
</html>
