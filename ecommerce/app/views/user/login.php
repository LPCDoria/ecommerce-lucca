<?php
session_start();
include_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifica se o usuário é o administrador
    if ($email === 'admin@gmail.com' && $password === 'admin') {
        session_start();
        $_SESSION['user_id'] = 1; // Define um ID fixo para o admin
        $_SESSION['username'] = 'Admin';
        $_SESSION['email'] = $email;
        header("Location: ../user/dashboard.php");
        exit();
    }

    // Verifica as credenciais do banco de dados
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        header("Location: /ecommerce/public/index2.php");
    } else {
        header("Location: /ecommerce/public/index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
            <a href="../../../public/index.php" class="btn btn-success">sair</a>
        </form>
    </div>
</body>
</html>