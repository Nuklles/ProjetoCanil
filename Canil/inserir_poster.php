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
    <style>
        body {
            background-color: #fff700;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="file"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Inserir poster</h2>
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
    ?>
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
    <br><br>
    <a href="menu_usuario.php">Voltar</a>
</body>
</html>
