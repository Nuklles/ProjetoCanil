<!DOCTYPE html>
<html>
<head>
	<title>Lista de canil disponivel</title>
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
	</style>
</head>
<body>
	<h1>Lista de canil disponivel</h1>

    <a href="menu_usuario.php">Voltar</a>
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

$sql = "SELECT id, nome, cnpj, telefone, email, cidade, estado, cep 
        FROM cadastro_empresa";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nome = $row['nome'];
        $cnpj = $row['cnpj'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
        $cep = $row['cep'];

        
        
        echo '<p>Nome da empresa: ' . $nome . '</p>';
        echo '<p>cnpj: ' . $cnpj . '</p>';
        echo '<p>telefone: ' . $telefone . '</p>';
        echo '<p>email: ' . $email . '</p>';
        echo '<p>cidade: ' . $cidade . '</p>';
        echo '<p>Estado: ' . $estado . '</p>';
        echo '<p>cep: ' . $cep . '</p>';
        echo '<form method="POST" action="dados_encaminhar_pet2.php">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="submit" value="SELECIONAR">
            </form>';
        echo '<br><br>';
    }
    
} else {
    echo "Nenhum canil disponível.";
}


$conn->close();
?>
