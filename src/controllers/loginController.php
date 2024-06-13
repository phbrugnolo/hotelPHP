<?php
session_start();
require_once '../DAL/adminDao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $adminDAL = new adminDao();
    $admin = $adminDAL->getAdminByEmailAndPassword($email, $senha);
    
    if ($admin) {
        $_SESSION['admin'] = $admin;
        header('Location: /src/index.php');
        exit();
    } else {
        header('Location: /src/views/auth/login.php?error=1');
        exit();
    }
}
?>
