<?php
session_start();
include('validar_usuario.php');
include('conexao.php');




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $telefone = $_POST['telefone'];
  $novo_email = $_POST['novo_email'];
  $senha_atual = $_POST['senha_atual'];
  $nova_senha = $_POST['nova_senha'];
  $confirmar_senha = $_POST['confirmar_senha'];

  
  $email = $_SESSION['email'];

  
  if (isset($_POST['senha_atual'])) {
    $senha_atual = $_POST['senha_atual'];

    
    $select_senha = "SELECT senha FROM login WHERE email = '$email'";
    $query_senha = mysqli_query($conexao, $select_senha);
    $dados_senha = mysqli_fetch_assoc($query_senha);
    $senha_banco = $dados_senha['senha'];

    
    if ($senha_atual === $senha_banco) {
      
      $nova_senha = $_POST['nova_senha'];
      $confirmar_senha = $_POST['confirmar_senha'];

      
      if ($nova_senha === $confirmar_senha) {
        
        $update_senha = "UPDATE login SET senha = '$nova_senha' WHERE email = '$email'";
        mysqli_query($conexao, $update_senha);
      } else {
        
        echo "A nova senha e a confirmação não coincidem";
      }
    } else {
      
      echo "Senha atual incorreta";
    }
  }

  
  $update_usuario = "UPDATE cadastro_usuario SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', email = '$novo_email' WHERE email = '$email'";
  mysqli_query($conexao, $update_usuario);

  
  $update_login = "UPDATE login SET email = '$novo_email' WHERE email = '$email'";
  mysqli_query($conexao, $update_login);

  
  $_SESSION['email'] = $novo_email;
}


$email = $_SESSION['email'];
$select = "SELECT nome, cpf, telefone, email FROM cadastro_usuario WHERE email = '$email'";
$query = mysqli_query($conexao, $select);
$dados = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar Perfil</title>
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
    form {
      margin: 30px auto;
      max-width: 400px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 5px;
      margin-bottom: 20px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Editar Perfil</h1>
  <form method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo isset($dados['nome']) ? $dados['nome'] : ''; ?>">

    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" value="<?php echo isset($dados['cpf']) ? $dados['cpf'] : ''; ?>">

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" value="<?php echo isset($dados['telefone']) ? $dados['telefone'] : ''; ?>">

    <label for="novo_email">Email:</label>
    <input type="text" id="novo_email" name="novo_email" value="<?php echo isset($dados['email']) ? $dados['email'] : ''; ?>">

    <label for="senha_atual">Senha Atual:</label>
    <input type="password" id="senha_atual" name="senha_atual">

    <label for="nova_senha">Nova Senha:</label>
    <input type="password" id="nova_senha" name="nova_senha">

    <label for="confirmar_senha">Confirmar Nova Senha:</label>
    <input type="password" id="confirmar_senha" name="confirmar_senha">

    <input type="submit" value="Salvar">

    <a href="menu_usuario.php">Voltar</a>
  </form>
</body>
</html>
