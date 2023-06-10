<?php
session_start();
include('validar_usuario.php');
include('conexao.php');

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pets = $_POST['id_pets'];
    $nomepet = $_POST['nomepet'];
    $especie = $_POST['especie'];
    $porte = $_POST['porte'];
    $sexo = $_POST['sexo'];
    $obs = $_POST['obs'];

    $update_pet = "UPDATE pets SET nomepet = '$nomepet', especie = '$especie', porte = '$porte', sexo = '$sexo', obs = '$obs' WHERE id_pets = $id_pets";
    mysqli_query($conexao, $update_pet);

    $mensagem = 'Dados atualizados com sucesso!';
}

if (isset($_POST['voltar'])) {
    $truncate_caches_pet = "TRUNCATE TABLE caches_pet";
    mysqli_query($conexao, $truncate_caches_pet);

    header('Location: gerenciador_posteres.php');
    exit();
}

$ordem_sql = "SELECT ordem FROM caches_pet ORDER BY ordem DESC LIMIT 1";
$result = mysqli_query($conexao, $ordem_sql);
$row = mysqli_fetch_assoc($result);
$ordem = $row['ordem'];

$id_pets_sql = "SELECT id_pets FROM caches_pet WHERE ordem = $ordem";
$result = mysqli_query($conexao, $id_pets_sql);
$row = mysqli_fetch_assoc($result);
$id_pets = $row['id_pets'];

$select = "SELECT nomepet, especie, porte, sexo, obs FROM pets WHERE id_pets = $id_pets";
$query = mysqli_query($conexao, $select);
$dados = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      border-radius: 10px;
      background-color: #D8BFD8;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 50px auto;
      padding: 50px;
    }
    h2 {
      color: #333;
      font-size: 24px;
      margin-top: 0;
      text-align: center;
    }
    label {
      color: #333;
      display: block;
      font-weight: bold;
      margin-top: 10px;
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
  </style>
</head>
<body>
  <div class="container">
    <h2>Editar Poster</h2>
    <form method="POST" action="">
      <input type="hidden" name="id_pets" value="<?php echo $id_pets; ?>">

      <label for="nomepet">Nome:</label>
      <input type="text" id="nomepet" name="nomepet" value="<?php echo isset($dados['nomepet']) ? $dados['nomepet'] : ''; ?>">

      <label for="especie">Espécie:</label>
      <input type="text" id="especie" name="especie" value="<?php echo isset($dados['especie']) ? $dados['especie'] : ''; ?>">

      <label for="porte">Porte:</label>
      <input type="text" id="porte" name="porte" value="<?php echo isset($dados['porte']) ? $dados['porte'] : ''; ?>">

      <label for="sexo">Sexo:</label>
      <input type="text" id="sexo" name="sexo" value="<?php echo isset($dados['sexo']) ? $dados['sexo'] : ''; ?>">

      <label for="obs">Observações:</label>
      <input type="text" id="obs" name="obs" value="<?php echo isset($dados['obs']) ? $dados['obs'] : ''; ?>">

      <input type="submit" value="Salvar">
      <input type="submit" name="voltar" value="Voltar">
    </form>
  </div>
</body>
</html>
