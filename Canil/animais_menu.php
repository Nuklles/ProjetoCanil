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
            flex-wrap: wrap;
        }
        
        .card {
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 25%;
            flex: 0 0 calc(25% - 20px); 
            box-sizing: border-box;
            padding: 20px;
            display: grid;
            justify-content: center;
            /*text-align: center;*/
            margin: 15px;
                    
            
        }

        .card img {
            
            height: 280px;
            width: 280px;
            border-radius: 10px;
            margin-bottom: 10px;
            margin-left: 8%;
            margin-right: 20%;
            
            
        }

        
        .card h4, .card p {
            display: inline-block;
            vertical-align: top;
            margin: 0;
            margin-top: 10px;

        }


        .back-button {
            position: absolute;
            top: 0;
            left: 0;
            
        }
        .back-link {
            font-size: 20px;
        }

    </style>
</head>
<body>
    <div class="back-button">
        <a class="back-link" href="menu_inicial.php"><<</a>
    </div>
    
    <?php
        // Código PHP para buscar os dados dos pets no banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "canil";

        // Criar conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consulta para obter os dados dos pets
        $sql = "SELECT arquivo, nomepet FROM pets";
        $result = $conn->query($sql);


        // Verificar se existem resultados
        if ($result->num_rows > 0) {
            // Iterar sobre os resultados e exibir os cards
            while ($row = $result->fetch_assoc()) {


                $imageData = $row['arquivo'];
                $nomePet = $row['nomepet'];
                
                
            
                echo '<div class="card">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';          
                echo '<h4>Nome do pet: </h4>';
                echo '<p>' . $nomePet . '</p>';
                echo '<a href="login.php">Ver mais informações</a>';
                echo '</div>';
                
            
            }
        } else {
            echo "Nenhum pet encontrado.";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    ?>

</body>
<div class="card-container">
  
</div>