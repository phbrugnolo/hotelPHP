<?php
include_once '../config/database.php';
include_once '../models/Reserva.php';

class ReservaController {
    private $db;
    private $reserva;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->reserva = new Reserva($this->db);
    }

    public function create() {
        if ($_POST) {
            $this->reserva->nome = $_POST['nome'];
            $this->reserva->email = $_POST['email'];
            $this->reserva->telefone = $_POST['telefone'];
            $this->reserva->checkin = $_POST['checkin'];
            $this->reserva->checkout = $_POST['checkout'];
            $this->reserva->quarto_tipo = $_POST['quarto_tipo'];

            if ($this->reserva->create()) {
                echo "Reserva feita com sucesso!";
            } else {
                echo "Erro ao fazer a reserva.";
            }
        }
    }

    public function readAll() {
        return $this->reserva->readAll();
    }
}

$controller = new ReservaController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->create();
}
?>
