<?php
    require_once __DIR__ . '/../controllers/AuthController.php';

    $authController = new AuthController(null); // Repositório não é necessário para logout
    $authController->logout();
?>
