<?php
session_start();
include('validar_usuario.php');
include('conexao.php');




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];

  
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
        echo "Dados atualizados com sucesso";
      } else {
        
        echo "A nova senha e a senha de confirmação não coincidem";
      }
    } else {
      
      echo "Senha atual incorreta";
    }
  }

  
  $update_usuario = "UPDATE cadastro_empresa SET nome = '$nome', cnpj = '$cnpj', telefone = '$telefone', email = '$novo_email', cidade = '$cidade', estado = '$estado', cep = '$cep' WHERE email = '$email'";
  mysqli_query($conexao, $update_usuario);

  
  $update_login = "UPDATE login SET email = '$novo_email' WHERE email = '$email'";
  mysqli_query($conexao, $update_login);

  
  $_SESSION['email'] = $novo_email;
}


$email = $_SESSION['email'];
$select = "SELECT nome, cnpj, telefone, email, cidade, estado, cep  FROM cadastro_empresa WHERE email = '$email'";
$query = mysqli_query($conexao, $select);
$dados = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar Perfil</title>    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-2r7BR16rjGytrGcxkkK2YX1op6aJ7WUyrxm0xApfQVQhbiyWqUP3rd76T3+3YcJ3mIr2IRv4yAij3E1TDcnFWA==" crossorigin="anonymous" />
  <style>
    .background-image {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      background-image: url("https://cdn.discordapp.com/attachments/968520924087328771/1114612833943048212/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
      background-size: cover;
      background-repeat: no-repeat;
    }
    body {
      background-color: #C0C0C0;
      font-family: Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 20px 50px rgba(10, 20, 30, 0.1);
      max-width: 400px;
      width: 100%;
      text-align: center;
      background-color: #00008B;
    }
    h2 {
      font-size: 25px;
      margin-top: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #FFC041;
      margin-bottom: 19px;
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
    input[type="email"],
    input[type="password"],
    input[type="checkbox"],
    input[type="Estado"],
    input[type="Cidade"],
    input[type="Cep"] {
      width: 100%;
      padding: 8px;
      border: none;
      border-radius: 4px;
      margin-bottom: 10px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }
    input[type="submit"]:hover {
      background-color: #FFD84D;
    }
    a {
      color: #FFFFFF;
      text-decoration: none;
    }
    .success {
      color: #FFFFFF;
      margin-top: 10px;
    }
    .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <form method="POST" action="">
    <div class="container">
      <h2>Editar Perfil</h2>
      <label for="nome">Nome da empresa:</label>
      <input type="text" id="nome" name="nome" value="<?php echo isset($dados['nome']) ? $dados['nome'] : ''; ?>">
    <label for="cnpj">CNPJ:</label>
    <input type="text" id="cnpj" name="cnpj" value="<?php echo isset($dados['cnpj']) ? $dados['cnpj'] : ''; ?>">

    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name="telefone" value="<?php echo isset($dados['telefone']) ? $dados['telefone'] : ''; ?>">

    <label for="novo_email">Email:</label>
    <input type="text" id="novo_email" name="novo_email" value="<?php echo isset($dados['email']) ? $dados['email'] : ''; ?>">
    
    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade" value="<?php echo isset($dados['cidade']) ? $dados['cidade'] : ''; ?>">

    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" value="<?php echo isset($dados['estado']) ? $dados['estado'] : ''; ?>">

    <label for="cep">Cep:</label>
    <input type="text" id="cep" name="cep" value="<?php echo isset($dados['cep']) ? $dados['cep'] : ''; ?>">

    <label for="senha_atual">Senha Atual:</label>
    <input type="password" id="senha_atual" name="senha_atual">

    <label for="nova_senha">Nova Senha:</label>
    <input type="password" id="nova_senha" name="nova_senha">

    <label for="confirmar_senha">Confirmar Nova Senha:</label>
    <input type="password" id="confirmar_senha" name="confirmar_senha">

    <p><input type="submit" value="Salvar"></p>
  
  <p><a href="menu_empresa.php">Voltar</a></p>
  </form>
</body>
</html>
