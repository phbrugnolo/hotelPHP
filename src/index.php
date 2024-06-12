<?php
require_once './controllers/QuartoController.php';
require_once './controllers/ClienteController.php';
require_once './controllers/ReservaController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'quarto';
$action = isset($_GET['action']) ? $_GET['action'] : 'menu';

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
                // Implemente uma ação padrão aqui
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
                // Implemente uma ação padrão aqui
                break;
        }
        break;
    default:
        // Implemente uma ação padrão aqui
        break;
}
?>
