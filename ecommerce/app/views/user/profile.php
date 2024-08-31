<?php
session_start();
include_once '../config/database.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Obtém os dados do usuário
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Processa o formulário de atualização
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Atualiza as informações do usuário
    $sql = "UPDATE users SET username = :username, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'email' => $email, 'id' => $user_id]);

    // Atualiza as informações na sessão
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    header("Location: profile.php");
    exit();
}
?>

<?php include_once 'app/views/layout/header.php'; ?>

<div class="container">
    <h2>Perfil de Usuário</h2>
    <form method="post">
        <div class="form-group">
            <label for="username">Nome de Usuário</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="../../../public/index.php" class="btn btn-success">sair</a>
    </form>
</div>

<?php include_once 'app/views/layout/footer.php'; ?>