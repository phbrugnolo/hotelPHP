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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente_cpf = trim($_POST['cliente_cpf']);
            $tipo_quarto = trim($_POST['tipo_quarto']);
            $data_checkin = $_POST['data_checkin'];
            $data_checkout = $_POST['data_checkout'];

            if (empty($cliente_cpf)) {
                $errors[] = "O CPF do cliente é obrigatório.";
            }

            if (empty($tipo_quarto)) {
                $errors[] = "O tipo do quarto é obrigatório.";
            }

            if (empty($data_checkin)) {
                $errors[] = "A data de check-in é obrigatória.";
            }

            if (empty($data_checkout)) {
                $errors[] = "A data de check-out é obrigatória.";
            }

            if (empty($errors)) {
                $reserva = new Reserva(
                    0,
                    $cliente_cpf,
                    $tipo_quarto,
                    $data_checkin,
                    $data_checkout
                );
                $this->reservaDao->criar($reserva);
                header('Location: index.php?controller=reserva&action=list');
            }
        } else {
            include './views/reserva/create.php';
        }
    }
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reserva = new Reserva(
                $id,
                $_POST['cliente_cpf'],
                $_POST['tipo_quarto'],
                $_POST['data_checkin'],
                $_POST['data_checkout']
            );
            $this->reservaDao->atualizar($reserva);
            header('Location: index.php?controller=reserva&action=list');
        } else {
            $reserva = $this->reservaDao->listarUm($id);
            include './views/reserva/edit.php';
        }
    }

    public function delete($id)
    {
        $this->reservaDao->deletar($id);
        header('Location: index.php?controller=reserva&action=list');
    }

    public function menu()
    {
        $dadosReservas = $this->reservaDao->listarTodos();
        include './views/reserva/menu.php';
    }
}
