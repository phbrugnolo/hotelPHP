<?php
    require_once 'controllers/quartoController.php';
    require_once 'controllers/ClienteController.php';
    require_once 'controllers/ReservaController.php';

    session_start();

    if (!isset($_SESSION['admin'])) {
        header('Location: /src/views/auth/login.php');
        exit();
    }

    $controller = isset($_GET['controller']) ? $_GET['controller'] : null;
    $action = isset($_GET['action']) ? $_GET['action'] : null;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto</title>
</head>
<body>
    <main>
        <?php if (!$controller): ?>
            <h1 class="titulo-menu-principal">Menu Principal</h1>
            <ul>
                <li><a href="index.php?controller=quarto&action=menu">Ver Quartos</a></li>
                <li><a href="index.php?controller=cliente&action=menu">Ver Clientes</a></li>
                <li><a href="index.php?controller=reserva&action=menu">Ver Reservas</a></li>
                <li><a href="/src/controllers/logoutController.php">Logout</a></li>
            </ul>
        <?php else: ?>
            <?php
            switch ($controller) {
                case 'quarto':
                    $quartoController = new QuartoController();
                    switch ($action) {
                        case 'create':
                            $quartoController->create();
                            break;
                        case 'edit':
                            $id = $_GET['id'];
                            $quartoController->edit($id);
                            break;
                        case 'list':
                            $quartoController->list();
                            break;
                        case 'show':
                            $id = $_GET['id'];
                            $quartoController->show($id);
                            break;
                        case 'delete':
                            $id = $_GET['id'];
                            $quartoController->delete($id);
                            break;
                        case 'menu':
                        default:
                            $quartoController->menu();
                            break;
                    }
                    break;
                case 'cliente':
                    $clienteController = new ClienteController();
                    switch ($action) {
                        case 'create':
                            $clienteController->create();
                            break;
                        case 'edit':
                            $id = $_GET['id'];
                            $clienteController->edit($id);
                            break;
                        case 'list':
                            $clienteController->list();
                            break;
                        case 'show':
                            $id = $_GET['id'];
                            $clienteController->show($id);
                            break;
                        case 'delete':
                            $id = $_GET['id'];
                            $clienteController->delete($id);
                            break;
                        default:
                            $clienteController->menu();
                            break;
                    }
                    break;
                case 'reserva':
                    $reservaController = new ReservaController();
                    switch ($action) {
                        case 'create':
                            $reservaController->create();
                            break;
                        case 'edit':
                            $id = $_GET['id'];
                            $reservaController->edit($id);
                            break;
                        case 'list':
                            $reservaController->list();
                            break;
                        case 'show':
                            $id = $_GET['id'];
                            $reservaController->show($id);
                            break;
                        case 'delete':
                            $id = $_GET['id'];
                            $reservaController->delete($id);
                            break;
                        default:
                            $reservaController->menu();
                            break;
                    }
                    break;
                default:
                    echo 'Controlador inválido!';
                    break;
            }
            ?>
        <?php endif; ?>
    </main>
</body>
</html>
