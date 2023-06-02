<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        
        body {
            background-image: url("https://cdn.discordapp.com/attachments/968520978227408906/1114002180937109505/Yellow_and_Orange_Playful_Pet_Adoption_Promotion_Banner_1.png");
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            background-color: #42DAF5;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            border-radius: 600px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(10, 20, 30, 40.1);
            max-width: 300px;
            width: 100%;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            color: #333;
            margin-top: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-field {
            margin-bottom: 10px;
        }

        .form-field label {
            font-weight: bold;
            color: #333;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .form-field input[type="text"],
        .form-field input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-field input[type="submit"] {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .form-field input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            color: #ff0000;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .link a {
            color: #333;
            text-decoration: none;
            margin: 0 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form_login').submit(function(e) {
                e.preventDefault();
                var email = $('#email').val();
                var senha = $('#senha').val();

                $.ajax({
                    type: 'POST',
                    url: 'autenticar.php',
                    data: { email: email, senha: senha },
                    success: function(response) {
                        if (response === 'success_empresa') {
                            window.location.href = 'menu_empresa.php';
                        } else if (response === 'success_usuario') {
                            window.location.href = 'menu_usuario.php';
                        } else {
                            $('#mensagem').text('Usuário ou senha inválidos');
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="icon" background-image: url="assests\icon-dog.jpeg" ></div>
    <div class="container">
        <div class="form-container">
            <h1>Login</h1>
            <form id="form_login" method="POST">
                <div class="form-field">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="form-field">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required>
                </div>
                <div class="form-field">
                    <input type="submit" name="enviar" value="Entrar">
                </div>
            </form>
            <div id="mensagem" class="message"></div>
            <div class="link">
                <a href="alterarSenha.php">Esqueci a senha</a> | <a href="cadastrar.php">Cadastrar</a>
            </div>
        </div>
    </div>
</body>
</html>