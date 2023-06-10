<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("https://cdn.discordapp.com/attachments/968520924087328771/1114612833943048212/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
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
            max-width: 300px;
            border-radius: 10px;
            margin-bottom: 10px;
            height: 300px;
            margin-left: 50px;
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

        if(isset($_GET['id'])) {
            $id_pets = $_GET['id'];

            $sql = "DELETE FROM pets WHERE id_pets = $id_pets";
            $result = $conn->query($sql);

            if ($result) {
                echo "Registro deletado com sucesso!";
            } else {
                echo "Erro ao deletar o registro: " . $conn->error;
            }
        }

        $selectUser = "SELECT id FROM cadastro_usuario WHERE email = '$email'";
        $queryUser = mysqli_query($conexao, $selectUser);
        $rowUser = mysqli_fetch_assoc($queryUser);
        $id = $rowUser['id'];

        $imageId = $id;

        $sql = "SELECT id_pets, arquivo, nomepet, especie, porte, sexo, obs FROM pets WHERE id = $imageId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                
                $id_pets = $row['id_pets'];
                $imageData = $row['arquivo'];
                $nomePet = $row['nomepet'];
                $especie = $row['especie'];
                $porte = $row['porte'];
                $sexo = $row['sexo'];
                $obs = $row['obs'];


                echo '<div class="container">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
                echo '<p>Nome do pet: ' . $nomePet . '</p>';
                echo '<p>Especie: ' . $especie . '</p>';
                echo '<p>Porte: ' . $porte. '</p>';
                echo '<p>Sexo: ' . $sexo . '</p>';
                echo '<p>Alguma observação? doenção? deficiencia?: ' . $obs . '</p>';
                echo '<a href="?id=' . $id_pets . '">Deletar</a>';
                echo '<form method="POST" action="editar_poster_cache.php">
                        <input type="hidden" name="id_pets" value="' . $id_pets . '">
                        <input type="submit" value="EDITAR">
                    </form>';
                echo '<br><br>';

            }

        } else {
            echo "Voce não tem posteres inseridos";
        }


        $conn->close();


        ?>

</body>
</html>
