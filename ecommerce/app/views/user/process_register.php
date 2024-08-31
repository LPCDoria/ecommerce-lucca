<?php
// Incluindo o arquivo de configuração do banco de dados
include_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os dados do formulário
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validando os dados (opcional)
    if (empty($username) || empty($email) || empty($password)) {
        echo "Todos os campos são obrigatórios!";
        exit();
    }

    // Hash da senha para segurança
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Inserindo o novo usuário no banco de dados
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password
        ]);

        // Redirecionando para a página de login após o registro
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao registrar o usuário: " . $e->getMessage();
    }
} else {
    // Se o método não for POST, redireciona de volta ao registro
    header("Location: register.php");
    exit();
}
?>