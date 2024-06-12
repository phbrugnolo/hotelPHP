<?php
require_once './controllers/quartoController.php';

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
    default:
        $quartoController = new QuartoController();
        $quartoController->menu();
        break;
}
?>
