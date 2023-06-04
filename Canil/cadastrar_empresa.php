<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-2r7BR16rjGytrGcxkkK2YX1op6aJ7WUyrxm0xApfQVQhbiyWqUP3rd76T3+3YcJ3mIr2IRv4yAij3E1TDcnFWA==" crossorigin="anonymous" />
    <style>
        .background-image {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-image: url("https://cdn.discordapp.com/attachments/968520924087328771/1114624732122337350/Banner_projeto_social_adocao_de_animais_amarelo_e_azul_1.png");
        background-size: cover;
        background-repeat: no-repeat;
    }
        body {
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
            box-shadow: 0 20px 50px rgba(10, 20, 30, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            background-color: #3E9AAB;
        }

        h2 {
            font-size: 24px;
            color: #000000;
            margin-top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFC041;
            margin-bottom: 20px;
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
        input[type="estado"],
        input[type="cidade"],
        input[type="cep"] {
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
            background-color: #45a049;
        }

        a {
            color: #FFC041;
            text-decoration: none;
        }

        .success {
            color: green;
            margin-top: 10px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="background-image"></div>
    <div class="container">
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
     <center>    
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
        </center>
        <input type="checkbox" name="checkbox1" value="1"> Aceito os <a href onclick="alert('não existe termos!!!!')">termos</a></a><br><br>
        <input type="submit" value="Cadastrar">
        <a href="http://"></a>
    </form>
    <br><br>
    <center>
    <a href="cadastrar.php">Voltar</a>
    </center>

</body>
</html>
