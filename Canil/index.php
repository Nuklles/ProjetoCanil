<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            background-color: #3E9AAB;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;
        }

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

        .form-container {
            border-radius: 10px;
            padding: 5px;
            box-shadow: 0 20px 50px rgba(10, 20, 30, 0.1);
            max-width: 290px;
            width: 100%;
            text-align: center;
            background-color: #3E9AAB;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            color: #FFC041;
            margin-top: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-field {
            margin-bottom: 20px;
            position: relative;
        }

        .form-field label {
            font-weight: bold;
            color: #FFC041;
            font-size: 18px;
            margin-bottom: 8px;
            position: absolute;
            top: 10px;
            left: 10px;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .form-field input[type="text"],
        .form-field input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #FFC041;
            background-color: transparent;
            outline: none;
            caret-color: #FFC041;
        }

        .form-field input[type="text"]:focus,
        .form-field input[type="password"]:focus {
            border-color: #FFC041;
        }

        .form-field input[type="text"]:focus + label,
        .form-field input[type="password"]:focus + label {
            font-size: 12px;
            top: -10px;
            left: 5px;
            color: #FFC041;
            background-color: #3E9AAB;
            padding: 2px;
            border-radius: 2px;
        }

        .form-field input[type="text"]:not(:placeholder-shown) + label,
        .form-field input[type="password"]:not(:placeholder-shown) + label {
            font-size: 12px;
            top: -10px;
            left: 5px;
            color: #FFC041;
            background-color: #3E9AAB;
            padding: 2px;
            border-radius: 2px;
        }

        .form-field input[type="submit"] {
            padding: 12px 20px;
            background-color: #FFC041;
            color: #3E9AAB;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .form-field input[type="submit"]:hover {
            background-color: #FFD84D;
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
            display: flex;
            justify-content: center;
        }

        .link a {
            color: #FFC041;
            text-decoration: none;
            margin: 0 5px;
        }

        .link a.btn-alterar-senha {
            margin-right: 10px;
        }

        .link a.btn-alterar-senha,
        .link a.btn-cadastrar {
            color: #3E9AAB;
            background-color: #FFC041;
            padding: 4px 8px;
            border-radius: 4px;
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
    <div class="background-image"></div>
    <div class="container">
        <div class="form-container">
            <h1>Efetue seu login ou faça seu cadastro:</h1>
            <form id="form_login" method="POST">
                <div class="form-field">
                    <input type="text" name="email" id="email" required>
                    <label for="email">Digite seu e-mail</label>
                </div>
                <div class="form-field">
                    <input type="password" name="senha" id="senha" required>
                    <label for="senha">Digite sua senha</label>
                </div>
                <div class="form-field">
                    <input type="submit" name="enviar" value="Entrar">
                </div>
                <div class="link">
                    <a href="alterarSenha.php" class="btn-alterar-senha">Esqueci a senha</a>
                    <a href="cadastrar.php" class="btn-cadastrar">Cadastrar</a>
                </div>
            </form>
            <div id="mensagem" class="message"></div>
        </div>
    </div>
</body>
</html>
