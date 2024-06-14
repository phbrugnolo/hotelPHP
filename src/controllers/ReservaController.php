<?php
require_once './models/reserva.php';
require_once './DAL/reservaDao.php';

class ReservaController
{
    private $reservaDao;

    public function __construct()
    {
        $this->reservaDao = new ReservaDao();
    }

    public function create()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
            $cliente_cpf = trim($_POST['cliente_cpf']);
            $tipo_quarto = trim($_POST['tipo_quarto']);
            $data_checkin = $_POST['data_checkin'];
            $data_checkout = $_POST['data_checkout'];

            $errors = $this->validate($cliente_cpf, $tipo_quarto, $data_checkin, $data_checkout);

            if (empty($errors)) {
                $reserva = new Reserva(
                    0,
                    $cliente_cpf,
                    $tipo_quarto,
                    $data_checkin,
                    $data_checkout
                );
                $this->reservaDao->criar($reserva);
                header('Location: index.php?controller=reserva&action=menu');
                exit();
            }
        }
        include './views/reserva/create.php';
    }

    public function edit($id)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
            $cliente_cpf = trim($_POST['cliente_cpf']);
            $tipo_quarto = trim($_POST['tipo_quarto']);
            $data_checkin = $_POST['data_checkin'];
            $data_checkout = $_POST['data_checkout'];

            $errors = $this->validate($cliente_cpf, $tipo_quarto, $data_checkin, $data_checkout);

            if (empty($errors)) {
                $reserva = new Reserva(
                    $id,
                    $cliente_cpf,
                    $tipo_quarto,
                    $data_checkin,
                    $data_checkout
                );
                $this->reservaDao->atualizar($reserva);
                header('Location: index.php?controller=reserva&action=menu');
                exit();
            }
        } else {
            $reserva = $this->reservaDao->listarUm($id);
        }

        include './views/reserva/edit.php';
    }

    public function delete($id)
    {
        $this->reservaDao->deletar($id);
        header('Location: index.php?controller=reserva&action=menu');
    }

    public function menu()
    {
        $dadosReservas = $this->reservaDao->listarTodos();
        include './views/reserva/menu.php';
    }

    private function validate($cliente_cpf, $tipo_quarto, $data_checkin, $data_checkout)
    {
        $errors = [];
    
        if (empty($cliente_cpf)) {
            $errors[] = "O CPF do cliente é obrigatório.";
        } else {
            $clienteExists = $this->reservaDao->clienteExiste($cliente_cpf);
            if (!$clienteExists) {
                $errors[] = "O CPF do cliente não está cadastrado no sistema.";
            }
        }
    
        if (empty($tipo_quarto)) {
            $errors[] = "O tipo do quarto é obrigatório.";
        } else {
            $tipoQuartoExists = $this->reservaDao->tipoQuartoExiste($tipo_quarto);
            if (!$tipoQuartoExists) {
                $errors[] = "O tipo de quarto não está cadastrado no sistema.";
            }
        }
    
        if (empty($data_checkin)) {
            $errors[] = "A data de check-in é obrigatória.";
        }

        if (empty($data_checkout)) {
            $errors[] = "A data de check-out é obrigatória.";
        }
    
        return $errors;
    }
    
}

