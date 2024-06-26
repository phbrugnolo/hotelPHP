<?php
require_once '../DAL/adminDao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../views/auth/register.php?error=email');
        exit();
    }

    $senha = $_POST['senha'];
    if (empty($senha) || strlen($senha) < 6) { 
        header('Location: ../views/auth/register.php?error=senha');
        exit();
    }

    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    $adminDao = new adminDao();
    $success = $adminDao->registrarAdmin($email, $senhaHash);

    if ($success) {
        header('Location: ../views/auth/login.php');
        exit();
    } else {
        header('Location: ../views/auth/register.php?error=registro');
        exit();
    }
}
?>
