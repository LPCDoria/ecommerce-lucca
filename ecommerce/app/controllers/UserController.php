<?php
// app/controllers/UserController.php
require_once '../app/models/User.php';

class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->userModel->createUser($username, $email, $password);
            header("Location: /login");
        }

        require '../app/views/user/register.php';
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->findUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: /dashboard");
            } else {
                echo "Email ou senha incorretos!";
            }
        }

        require '../app/views/user/login.php';
    }
}

?>