<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Teste</title>
</head>
<body>

<h2>Formulário de Teste</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nome: <input type="text" name="nome"><br><br>
    Email: <input type="text" name="email"><br><br>
    <input type="submit" name="submit" value="Enviar">
</form>

<?php
// Configurações de conexão ao banco de dados PostgreSQL
$host = 'IP POstgrsql'; // nome do serviço do contêiner PostgreSQL
$dbname = 'postgress';
$username = 'postgres';
$password = '12345678';

try {
    // Conecta ao banco de dados
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Coleta os dados do formulário
        $nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);

        // Insere os dados no banco de dados
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Exibe mensagem de sucesso
        echo "<h2>Dados submetidos com sucesso:</h2>";
        echo "Nome: $nome <br>";
        echo "Email: $email";
    }
} catch(PDOException $e) {
    // Em caso de erro na conexão ou na inserção de dados, exibe uma mensagem de erro
    echo "Erro: " . $e->getMessage();
}
?>

</body>
</html>
