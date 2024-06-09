<?php
session_start();

class AdminController {
    private $admin_user = "admin";
    private $admin_password = "password";

    public function login() {
        if ($_POST['usuario'] == $this->admin_user && $_POST['senha'] == $this->admin_password) {
            $_SESSION['admin'] = true;
            header("Location: dashboard.php");
        } else {
            echo "Credenciais inválidas.";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: login.php");
    }
}

$controller = new AdminController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->login();
}
?>
