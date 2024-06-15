<?php
session_start();

require_once '../DAL/adminDao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $adminDAL = new adminDao();
    $admin = null;

    try {
        $admin = $adminDAL->getAdminByEmail($email);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }

    if (isset($admin) && password_verify($senha, $admin['senha'])) {
        $_SESSION['admin'] = $admin['email'];
        if (!isset($_COOKIE['username'])) {
            setcookie('username', $admin['email'], time() + (86400 * 30), "/");
        }
        header('Location: /src/index.php');
        exit();
    } else {
        header('Location: /src/views/auth/login.php?error=1');
        exit();
    }
    
}
?>
