<?php
session_start();
include('validar_usuario.php');
include('conexao.php');
$email = $_SESSION['email'];

$select = "SELECT email FROM login WHERE email = '$email'";
$query = mysqli_query($conexao, $select);
$dado = mysqli_fetch_row($query);
echo $dado[0];

?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <h2>Encaminhar pet</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $host = 'localhost';  
        $db = 'nuvem';  
        $user = 'root';  
        $pass = '';  

        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
            
        $sql = "SELECT ordem FROM caches";
        $sql = "SELECT ordem FROM caches ORDER BY ordem DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ordem = $row['ordem'];
        $sql = "SELECT id FROM caches WHERE ordem = $ordem";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];



            
            $id = $row['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $cep = $_POST['cep'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $especie = $_POST['especie'];
            $porte = $_POST['porte'];
            $sexo = $_POST['sexo'];
            $obs = $_POST['obs'];

            $sql = "INSERT INTO dados (id, nome, cpf, cidade, estado, cep, telefone, email, especie, porte, sexo, obs) VALUES ('$id', '$nome', '$cpf', '$cidade', '$estado', '$cep', '$telefone', '$email', '$especie', '$porte', '$sexo', '$obs')";

            if ($conn->query($sql) === TRUE) {
                echo "Formulário enviado com sucesso!<br>";
                
                
                $sql = "TRUNCATE caches";
                if ($conn->query($sql) === TRUE) {
                    //echo "cache limpado com sucesso.";
                } else {
                    echo "Erro ao limpar o cache: " . $conn->error;
                }
            } else {
                echo "Erro ao enviar o formulário, tente novamente! " . $conn->error;
            }

            $conn->close();
        }
    
?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Nome completo:</label>
        <input type="text" name="nome" required><br><br>
        <label>CPF:</label>
        <input type="text" name="cpf" required><br><br>
        <label>Cidade:</label>
        <input type="text" name="cidade" required><br><br>
        <label>Estado:</label>
        <input type="text" name="estado" required><br><br>
        <label>Cep:</label>
        <input type="text" name="cep" required><br><br>
        <label>Telefone:</label>
        <input type="text" name="telefone" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Especie:</label>
        <input type="text" name="especie" required><br><br>
        <label>porte:</label>
        <input type="text" name="porte" required><br><br>
        <label>sexo:</label>
        <input type="text" name="sexo" required><br><br>
        <label>Alguma atenção especial?:</label>
        <input type="text" name="obs" required><br><br>
        <input type="submit" value="enviar">
    </form>
    <br><br>
    <a href="menu_usuario.php">Voltar</a>
</body>
</html>