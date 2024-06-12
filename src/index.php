<?php
require_once './controllers/QuartoController.php';
require_once './controllers/ClienteController.php';
require_once './controllers/ReservaController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : 'menu';

if (!$controller) {
    // Menu de seleção inicial
    echo '<h1>Menu Principal</h1>';
    echo '<ul>';
    echo '<li><a href="index.php?controller=quarto&action=menu">Ver Quartos</a></li>';
    echo '<li><a href="index.php?controller=cliente&action=menu">Ver Clientes</a></li>';
    echo '<li><a href="index.php?controller=reserva&action=menu">Ver Reservas</a></li>';
    echo '</ul>';
} else {
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
}
?>
