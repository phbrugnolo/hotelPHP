<?php
    require_once './models/reserva.php';
    require_once './DAL/reservaDao.php';
    

    //Arrumar os require_once

    class ReservaController
    {
        private $reservaDao;

        public function __construct()
        {
            $this->reservaDao = new ReservaDao();
        }

        public function create()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $reserva = new Reserva(
                    0, // O ID será gerado pelo banco de dados
                    $_POST['quarto_id'],
                    $_POST['cliente_id'],
                    $_POST['data_checkin'],
                    $_POST['data_checkout'],
                    $_POST['status']
                );
                $this->reservaDao->criar($reserva);
                header('Location: index.php?controller=reserva&action=list');
            } else {
                include './views/reserva/create.php';
            }
        }

        public function edit($id)
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $reserva = new Reserva(
                    $id,
                    $_POST['quarto_id'],
                    $_POST['cliente_id'],
                    $_POST['data_checkin'],
                    $_POST['data_checkout'],
                    $_POST['status']
                );
                $this->reservaDao->atualizar($reserva);
                header('Location: index.php?controller=reserva&action=list');
            } else {
                $reserva = $this->reservaDao->listarUm($id);
                include './views/reserva/edit.php';
            }
        }

        public function list()
        {
            $reservas = $this->reservaDao->listarTodos();
            include './views/reserva/list.php';
        }

        public function show($id)
        {
            $reserva = $this->reservaDao->listarUm($id);
            include './views/reserva/show.php';
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
?>
