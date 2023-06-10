<!DOCTYPE html>
<html>
<head>
</head>
<body>

    
    <a href="menu_empresa.php">Voltar</a>
    <br><br><br>
	
</body>
</html>
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

$selectUser = "SELECT id FROM cadastro_empresa WHERE email = '$email'";
$queryUser = mysqli_query($conexao, $selectUser);
$rowUser = mysqli_fetch_assoc($queryUser);
$id = $rowUser['id'];


$conn->close();


$host = 'localhost';
$db = 'nuvem';
$user = 'root';
$pass = '';

$connNuvem = new mysqli($host, $user, $pass, $db);


if ($connNuvem->connect_error) {
    die("Falha na conexão com o banco de dados: " . $connNuvem->connect_error);
}

$sql = "SELECT nome, cpf, cidade, estado, cep, telefone, email, especie, porte, sexo, obs FROM dados WHERE id = '$id'";
$result = $connNuvem->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        $nome = $row['nome'];
        $cpf = $row['cpf'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
        $cep = $row['cep'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $especie = $row['especie'];
        $porte = $row['porte'];
        $sexo = $row['sexo'];
        $obs = $row['obs'];
        
        
        echo 'Nome: ' . $nome . '</p>';
        echo 'CPF: ' . $cpf . '</p>';
        echo 'cidade: ' . $cidade . '</p>';
        echo 'Estado: ' . $estado . '</p>';
        echo 'CEP: ' . $cep . '</p>';
        echo 'Telefone: ' . $telefone . '</p>';
        echo 'Email: ' . $email . '</p>';
        echo 'Especie: ' . $especie . '</p>';
        echo 'Porte: ' . $porte . '</p>';
        echo 'Sexo: ' . $sexo . '</p>';
        echo 'Obs: ' . $obs . '</p>';
        echo '<br><br><br>';




    }
} else {
    echo "Nenhum formulário recebido.";
}


$connNuvem->close();
?>
