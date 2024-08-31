<?php
include_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);

    header("Location: login.php");
}
?>

<!-- app/views/user/register.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<div class="container mt-5">
    <h2>Registro</h2>
    <form action="process_register.php" method="post">
        <!-- Campos do formulário de registro -->
        <div class="form-group">
            <label for="username">Usuário:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="../../../public/index.php" class="btn btn-success">sair</a>
    </form>
</div>
<?php
// Incluindo o footer
include_once '../layout/footer.php';
?>
</body>
</html>