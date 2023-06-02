<html>
<head>
</head>
<body>
    <a href="menu_usuario.php">Voltar</a>
    <br><br><br>
</form>
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


$sql = "SELECT p.arquivo, p.nomepet, p.especie, p.porte, p.sexo, p.obs, u.email, u.telefone 
        FROM pets AS p
        INNER JOIN cadastro_usuario AS u ON p.id = u.id";
        
        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageData = $row['arquivo'];
        $nomePet = $row['nomepet'];
        $especie = $row['especie'];
        $porte = $row['porte'];
        $sexo = $row['sexo'];
        $obs = $row['obs'];
        $email = $row['email'];
        $telefone = $row['telefone'];

        
        echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
        echo '<p>Nome do pet: ' . $nomePet . '</p>';
        echo '<p>Especie: ' . $especie . '</p>';
        echo '<p>Porte: ' . $porte . '</p>';
        echo '<p>Sexo: ' . $sexo . '</p>';
        echo '<p>Alguma observação? Doença? Deficiência?: ' . $obs . '</p>';
        echo '<p>Email: ' . $email . '</p>';
        echo '<p>Telefone: ' . $telefone . '</p>';
    }
}
    $sql = "SELECT p.arquivo, p.nomepet, p.especie, p.porte, p.sexo, p.obs, u.email, u.telefone 
        FROM pets_empresa AS p
        INNER JOIN cadastro_empresa AS u ON p.id = u.id";
        
        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageData = $row['arquivo'];
        $nomePet = $row['nomepet'];
        $especie = $row['especie'];
        $porte = $row['porte'];
        $sexo = $row['sexo'];
        $obs = $row['obs'];
        $email = $row['email'];
        $telefone = $row['telefone'];

        
        echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
        echo '<p>Nome do pet: ' . $nomePet . '</p>';
        echo '<p>Especie: ' . $especie . '</p>';
        echo '<p>Porte: ' . $porte . '</p>';
        echo '<p>Sexo: ' . $sexo . '</p>';
        echo '<p>Alguma observação? Doença? Deficiência?: ' . $obs . '</p>';
        echo '<p>Email: ' . $email . '</p>';
        echo '<p>Telefone: ' . $telefone . '</p>';
    }
} else {
    echo "Nenhum pet encontrado.";
}

$conn->close();


?>