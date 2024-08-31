<?php
// Incluindo o arquivo de configuração do banco de dados
include_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validando os dados
    if (empty($email) || empty($password)) {
        echo "Todos os campos são obrigatórios!";
        exit();
    }

    try {
        // Buscando o usuário no banco de dados
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Iniciando a sessão e armazenando informações do usuário
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            // Redirecionando para o dashboard após o login
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Email ou senha incorretos!";
        }
    } catch (PDOException $e) {
        echo "Erro ao processar o login: " . $e->getMessage();
    }
} else {
    // Se o método não for POST, redireciona de volta ao login
    header("Location: login.php");
    exit();
}
?>