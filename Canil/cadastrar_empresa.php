<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Empresa</title>
    <style>
        .success {
            color: green;
        }

        .error {
            color: red;
        }

        
    </style>
</head>

<body>
    <h2>Cadastro de Empresa</h2>
    <?php
    $successMessage = $errorMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $host = 'localhost';
        $db = 'canil';
        $user = 'root';
        $pass = '';

        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }


        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmar_senha'];

        if (!preg_match('/^[0-9]{14}$/', $cnpj)) {
            $errorMessage = "CNPJ inválido. Digite exatamente 14 números.";
        } else {

            if ($senha !== $confirmarSenha) {
                $errorMessage = "A senha e a confirmação de senha não coincidem!";
            } else {

                $sql = "SELECT * FROM cadastro_empresa WHERE cnpj = '$cnpj'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $errorMessage = "Este CNPJ já existe um cadastro!";
                }

                $sql = "SELECT * FROM cadastro_empresa WHERE telefone = '$telefone'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $errorMessage = "Este telefone já existe um cadastro!<br>";
                }

                $sql = "SELECT * FROM cadastro_empresa WHERE email = '$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $errorMessage =  "Este E-mail já existe um cadastro!<br>";
                }

                $sql = "SELECT * FROM cadastro_usuario WHERE telefone = '$telefone'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $errorMessage = "Este telefone já existe um cadastro!<br>";
                }

                $sql = "SELECT * FROM cadastro_usuario WHERE email = '$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $errorMessage = "Este E-mail já existe um cadastro!<br>";
                }

                if (empty($errorMessage)) {
                    if (isset($_POST['checkbox1'])) {
                        // a caixinha de termos
                
                        $sql = "INSERT INTO cadastro_empresa (nome, cnpj, telefone, email, cidade, estado, cep) VALUES ('$nome', '$cnpj', '$telefone', '$email', '$cidade', '$estado', '$cep')";

                        if ($conn->query($sql) === TRUE) {
                            $successMessage = "Usuário cadastrado com sucesso!<br>";
                        } else {
                            $errorMessage = "Erro ao cadastrar o usuário, tente novamente!: " . $conn->error;
                        }


                        $sql = "INSERT INTO login (email, senha) VALUES ('$email', '$senha')";

                        if ($conn->query($sql) === TRUE) {
                            //$successMessage = "Login cadastrado com sucesso!";
                        } else {
                            $errorMessage = "Erro ao cadastrar o login, tente novamente!: " . $conn->error;
                        }
                    } else {
                        $errorMessage = "aceite os termos " . $conn->error;
                    }
                }
            }
        }
          
        $conn->close();
    }
    ?>
    <?php if (!empty($successMessage)) : ?>
        <p class="success"><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <?php if (!empty($errorMessage)) : ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>
        <label>CNPJ:</label>
        <input type="text" name="cnpj" required><br><br>
        <label>Telefone:</label>
        <input type="text" name="telefone" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>cidade:</label>
        <input type="cidade" name="cidade" required><br><br>
        <label>estado:</label>
        <input type="estado" name="estado" required><br><br>
        <label>cep:</label>
        <input type="cep" name="cep" required><br><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>
        <label>Confirmar Senha:</label>
        <input type="password" name="confirmar_senha" required><br><br>
        <input type="checkbox" name="checkbox1" value="1"> Aceito os <a href onclick="alert('não existe termos!!!!')">termos</a></a><br><br>
        <input type="submit" value="Cadastrar">
        <a href="http://"></a>
        
                

    </form>
    <br><br>
    <a href="cadastrar.php">Voltar</a>
</body>
</html>