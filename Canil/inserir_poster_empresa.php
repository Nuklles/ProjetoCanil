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
  <title>Inserir poster</title>
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $host = 'localhost';  
        $db = 'canil';  
        $user = 'root';  
        $pass = '';  

        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
       
    }
       
    
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        
        
        $nomepet = $_POST['nomepet'];
        $especie = $_POST['especie'];
        $porte = $_POST['porte'];
        $sexo = $_POST['sexo'];
        $obs = $_POST['obs'];
        

        
        $nomeImagem = $_FILES['imagem']['name'];
        $caminhoTemporario = $_FILES['imagem']['tmp_name'];
        
    
        
        $conteudoImagem = file_get_contents($caminhoTemporario);
        
        $selectUser = "SELECT id FROM cadastro_empresa WHERE email = '$email'";
        $queryUser = mysqli_query($conexao, $selectUser);
        $rowUser = mysqli_fetch_assoc($queryUser);
        $id = $rowUser['id'];

    
        
        $sql = "INSERT INTO pets_empresa (nome, arquivo, nomepet, especie, porte, sexo, obs, id) VALUES (?, ?,'$nomepet', '$especie', '$porte', '$sexo', '$obs', '$id')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nomeImagem, $conteudoImagem);
    
        
        if ($stmt->execute()) {
        echo "Imagem armazenada no banco de dados com sucesso.";
        } else {
        echo "Erro ao armazenar a imagem no banco de dados: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    
                    
        ?>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    h2 {
      color: #333;
      font-size: 24px;
      text-align: center;
    }
    form {
      max-width: 400px;
      margin: 30px auto;
      padding: 40px;
      background-color: #FFB6C1;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
      display: block;
      margin-top: 10px;
      color: #333;
      font-weight: bold;
    }
    input[type="text"],
    input[type="file"] {
      width: 98%;
      padding: 8px;
      border: 2px solid #ccc;
      border-radius: 5px;
      margin-top: 5px;
    }
    input[type="text"] {
      width: 95%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-top: 5px;
    }
    input[type="submit"] {
      background-color: #4caf50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    input[type="submit"][name="voltar"] {
      background-color: #aaa;
    }
    input[type="submit"][name="voltar"]:hover {
      background-color: #999;
    }
    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #333;
      text-decoration: none;
    }
       
  </style>
</head>
<body>
  <h2>Inserir poster</h2>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <label>Insira a foto do pet</label>
    <input type="file" name="imagem"><br><br>
    <label>Nome do pet:</label>
    <input type="text" name="nomepet" required><br><br>
    <label>Espécie:</label>
    <input type="text" name="especie" required><br><br>
    <label>Porte:</label>
    <input type="text" name="porte" required><br><br>
    <label>Sexo:</label>
    <input type="text" name="sexo" required><br><br>
    <label>Alguma observação? Doença? Deficiência?</label><br><br>
    <input type="text" name="obs" required><br><br>
    <input type="submit" value="Enviar">
  </form>
  <a href="menu_empresa.php">Voltar</a>
</body>
</html>
