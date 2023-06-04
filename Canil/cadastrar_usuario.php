<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
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
            margin: 110;
        }

        .container {
            border-radius: 10px;
            padding: 50px;
            box-shadow: 0 20px 50px rgba(10, 20, 30, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            background-color: #3E9AAB;
            overflow-y: auto; 
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
        input[type="checkbox"]{
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
    <div class="container">
        <h2><i class="fas fa-paw"></i> Cadastro de Usuário <i class="fas fa-paw"></i></h2>
        <?php if (!empty($successMessage)): ?>
            <p class="success"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <?php if (!empty($errorMessage)): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-field">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-field">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required>
            </div>
            <div class="form-field">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-field">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-field">
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>
            </div>
            <div class="form-field checkbox">
            <input type="checkbox" name="checkbox1" value="1" required> Aceito os <a href onclick="alert('não existe termos!!!!')">termos</a><br><br>
            <input type="submit" value="Cadastrar">
            <a href="cadastrar.php">Voltar</a>
        </form>
    </div>
</body>

</html>

