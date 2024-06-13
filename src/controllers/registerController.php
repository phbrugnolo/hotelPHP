<?php
session_start();
require_once '../DAL/adminDao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    
    $adminDao = new adminDao();
    $success = $adminDao->registrarAdmin($email, $senha);
    
    if ($success) {
        header('Location: ../views/auth/login.php');
        exit();
    } else {
        header('Location: ../views/auth/register.php?error=1');
        exit();
    }
}
?>
