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
      if (empty($nova_senha) && empty($confirmar_senha)) {
        $nova_senha = $_POST['nova_senha'];
        $confirmar_senha = $_POST['confirmar_senha'];
      } else {

        if ($nova_senha === $confirmar_senha) {
          $update_senha = "UPDATE login SET senha = '$nova_senha' WHERE email = '$email'";
          mysqli_query($conexao, $update_senha);
          echo "Dados atualizados com sucesso";
        } else {
          echo "A nova senha e a senha de confirmação não coincidem";
        }
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
      background-image: url("https://cdn.discordapp.com/attachments/968520924087328771/1114612833943048212/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-color: #FFD84D;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      border-radius: 10px;
      padding: 50px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 200%;
      text-align: center;
      background-color: #3E9AAB;
    }

    h2 {
      font-size: 24px;
      color: #FFC041;
      margin: 0 0 20px;
    }

    label {
      font-weight: bold;
      color: #FFC041;
      font-size: 14px;
      display: block;
      text-align: left;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      border: none;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 5px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 45%;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #FFD84D;
      
    }

    a {
      color: #FFC041;
      text-decoration: none;
    }

    .back-link {
      display: inline-block;
      margin-top: 20px;
      color: #FFC041;
      text-decoration: none;
      background-color: #4CAF50;
      padding: 10px 20px;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .back-link:hover {
      background-color: #FFD84D;
    }

    .user-email {
      color: black;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .nome_email {
      background-color: #3E9AAB;
      color: white;
      border-radius: 10px;
      padding: 10px;
      width: 50%;
    }
    .error-message {
      color: red;
      font-size: 14px;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Editar Perfil</h2>
    <form method="POST" action="">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" value="<?php echo isset($dados['nome']) ? $dados['nome'] : ''; ?>">

      <label for="cpf">CPF:</label>
      <input type="text" id="cpf" name="cpf" value="<?php echo isset($dados['cpf']) ? $dados['cpf'] : ''; ?>">

      <label for="telefone">Telefone:</label>
      <input type="text" id="telefone" name="telefone" value="<?php echo isset($dados['telefone']) ? $dados['telefone'] : ''; ?>">

      <label for="novo_email">Email:</label>
      <input type="text" id="novo_email" name="novo_email" value="<?php echo isset($dados['email']) ? $dados['email'] : ''; ?>">

      <label for="senha_atual">Digite sua senha:</label>
      <input type="password" id="senha_atual" name="senha_atual">

      <label for="nova_senha">Nova Senha:</label>
      <input type="password" id="nova_senha" name="nova_senha">

      <label for="confirmar_senha">Confirmar Nova Senha:</label>
      <input type="password" id="confirmar_senha" name="confirmar_senha">

      <input type="submit" value="Salvar">

      <a href="menu_usuario.php">Voltar</a>
    </form>
  </div>
</body>
</html>
