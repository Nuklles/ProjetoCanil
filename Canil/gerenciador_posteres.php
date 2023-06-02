<?php

session_start();
include('validar_usuario.php');
include('conexao.php');
$email = $_SESSION['email'];

//$select = "SELECT email FROM login WHERE email = '$email'";
//$query = mysqli_query($conexao, $select);
//$dado = mysqli_fetch_row($query);
//echo $dado[0];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canil";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


//$imageId = 1;



$selectUser = "SELECT id FROM cadastro_usuario WHERE email = '$email'";
        $queryUser = mysqli_query($conexao, $selectUser);
        $rowUser = mysqli_fetch_assoc($queryUser);
        $id = $rowUser['id'];

$imageId = $id; 

$sql = "SELECT arquivo, nomepet, especie, porte, sexo, obs FROM pets WHERE id = $imageId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        //$row = $result->fetch_assoc();
        $imageData = $row['arquivo'];
        $nomePet = $row['nomepet'];
        $especie = $row['especie'];
        $porte = $row['porte'];
        $sexo = $row['sexo'];
        $obs = $row['obs'];


        
        echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Imagem">';
        echo '<p>Nome do pet: ' . $nomePet . '</p>';
        echo '<p>Especie: ' . $especie . '</p>';
        echo '<p>Porte: ' . $nomePet . '</p>';
        echo '<p>Sexo: ' . $sexo . '</p>';
        echo '<p>Alguma observação? doenção? deficiencia?: ' . $obs . '</p>';
    }

} else {
    echo "Voce não tem posteres inseridos";
}


$conn->close();


?>