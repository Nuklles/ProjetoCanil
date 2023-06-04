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
            background-image: url("https://cdn.discordapp.com/attachments/968520924087328771/1114612833943048212/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_3.png");
            background-size: cover;
            background-repeat: no-repeat;
        }

        body {
            background-color: #FFD84D;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 20px 50px rgba(10, 20, 30, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            background-color: #3E9AAB;
        }

        h2 {
            font-size: 24px;
            color: #FFC041;
            margin-top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .form-field {
            margin-bottom: 20px;
            position: relative;
        }

        .form-field label {
            font-weight: bold;
            color: #FFC041;
            font-size: 14px;
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        .form-field input[type="text"],
        .form-field input[type="password"],
        .form-field input[type="email"] {
            width: 88%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #000000;
            background-color: #FFFFFF;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-field input[type="text"]:focus,
        .form-field input[type="password"]:focus,
        .form-field input[type="email"]:focus {
            border-color: #FFC041;
        }

        .form-field input[type="checkbox"] {
            margin-right: 5px;
            vertical-align: middle;
        }

        .form-field input[type="submit"] {
            padding: 12px;
            background-color: #FFC041;
            color: #FFFFFF;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .form-field input[type="submit"]:hover {
            background-color: #FFD84D;
        }

        .link {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .link a {
            color: #FFC041;
            text-decoration: none;
            margin: 0 5px;
            background-color: #FFC041;
            color: #000000;
            font-size: 16px;
            padding: 8px 16px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
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
                <input type="checkbox" id="checkbox1" name="checkbox1" value="1" required>
                <label for="checkbox1"><a href="javascript:void(0);" onclick="openTermsPopup()">Aceito os termos <i class="fas fa-paw"></i></a></label>
            </div>
            <input type="submit" value="Cadastrar">
        </form>
        <div class="link">
            <a href="cadastrar.php"><i class="fas fa-paw"></i> Voltar</a>
        </div>
    </div>

    <script>
        function openTermsPopup() {
            window.open('termos.html', 'Termos de Uso', 'width=600,height=400');
        }
    </script>
</body>
</html>

