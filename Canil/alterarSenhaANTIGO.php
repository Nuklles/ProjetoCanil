<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmarEmail"])) {
    $email = $_POST["email"];

    $dsn = "mysql:host=localhost;dbname=canil";
    $usuario = "root";
    $senha = "";
    $conexao = new PDO($dsn, $usuario, $senha);

    $consultaUsuarioEmpresa = $conexao->prepare("SELECT * FROM cadastro_usuario WHERE email = :email");
    $consultaUsuarioEmpresa->bindValue(":email", $email);
    $consultaUsuarioEmpresa->execute();
    $usuarioEmpresa = $consultaUsuarioEmpresa->fetch(PDO::FETCH_ASSOC);

    if ($usuarioEmpresa) {
        if (!empty($_POST["nome"]) && !empty($_POST["cpf"]) && !empty($_POST["telefone"]) && !empty($_POST["novaSenha"])) {
            if ($_POST["nome"] === $usuarioEmpresa["nome"] && $_POST["cpf"] === $usuarioEmpresa["cpf"] && $_POST["telefone"] === $usuarioEmpresa["telefone"]) {
                $novaSenha = $_POST["novaSenha"];
                $atualizarSenha = $conexao->prepare("UPDATE login SET senha = :novaSenha WHERE email = :email");
                $atualizarSenha->bindValue(":novaSenha", $novaSenha);
                $atualizarSenha->bindValue(":email", $email);
                $atualizarSenha->execute();

                if ($atualizarSenha->rowCount() > 0) {
                    echo "Senha alterada com sucesso!";
                } elseif ($atualizarSenha->rowCount() === 0) {
                    echo "Nenhuma alteração foi feita na senha.";
                } else {
                    echo "Ocorreu um erro ao alterar a senha. Por favor, tente novamente mais tarde.";
                }
            } else {
                echo "Dados incorretos. Por favor, verifique suas informações e tente novamente.";
            }
        } else {
            echo '
            <form method="POST" action="alterarSenha.php">
                <input type="hidden" name="email" value="' . $email . '">
                <label>Nome:</label>
                <input type="text" name="nome" required><br>
                <label>CPF:</label>
                <input type="text" name="cpf" required><br>
                <label>Telefone:</label>
                <input type="text" name="telefone" required><br>
                <label>Nova Senha:</label>
                <input type="password" name="novaSenha" required><br>
                <input type="submit" name="alterarSenha" value="Alterar Senha">
            </form>
            ';
        }
    } else {
        $consultaEmpresa = $conexao->prepare("SELECT * FROM cadastro_empresa WHERE email = :email");
        $consultaEmpresa->bindValue(":email", $email);
        $consultaEmpresa->execute();
        $empresa = $consultaEmpresa->fetch(PDO::FETCH_ASSOC);

        if ($empresa) {
            if (!empty($_POST["nome"]) && !empty($_POST["cnpj"]) && !empty($_POST["telefone"]) && !empty($_POST["novaSenha"])) {
                if ($_POST["nome"] === $empresa["nome"] && $_POST["cnpj"] === $empresa["cnpj"] && $_POST["telefone"] === $empresa["telefone"]) {
                    $novaSenha = $_POST["novaSenha"];
                    $atualizarSenha = $conexao->prepare("UPDATE login SET senha = :novaSenha WHERE email = :email");
                    $atualizarSenha->bindValue(":novaSenha", $novaSenha);
                    $atualizarSenha->bindValue(":email", $email);
                    $atualizarSenha->execute();

                    if ($atualizarSenha->rowCount() > 0) {
                        echo "Senha alterada com sucesso!";
                    } elseif ($atualizarSenha->rowCount() === 0) {
                        echo "Nenhuma alteração foi feita na senha.";
                    } else {
                        echo "Ocorreu um erro ao alterar a senha. Por favor, tente novamente mais tarde.";
                    }
                } else {
                    echo "Dados incorretos. Por favor, verifique suas informações e tente novamente.";
                }
            } else {
                echo '
                <form method="POST" action="alterarSenha.php">
                    <input type="hidden" name="email" value="' . $email . '">
                    <label>Nome:</label>
                    <input type="text" name="nome" required><br>
                    <label>CNPJ:</label>
                    <input type="text" name="cnpj" required><br>
                    <label>Telefone:</label>
                    <input type="text" name="telefone" required><br>
                    <label>Nova Senha:</label>
                    <input type="password" name="novaSenha" required><br>
                    <input type="submit" name="alterarSenha" value="Alterar Senha">
                </form>
                ';
            }
        } else {
            echo "Email não encontrado. Por favor, verifique seu email e tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alterar Senha</title>
</head>
<body>
    <h1>Alterar Senha</h1>
    <form method="POST" action="alterarSenha.php">
        <label>Email:</label>
        <input type="email" name="email" required>
        <input type="submit" name="confirmarEmail" value="Confirmar Email">
    </form>
</body>
</html>