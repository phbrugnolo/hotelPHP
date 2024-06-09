<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="../../views/listar_reservas.php">Ver Reservas</a>
    <a href="../../controllers/AdminController.php?logout=true">Logout</a>
</body>
</html>
