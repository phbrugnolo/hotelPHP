<?php 

class ReservaController {

    private $reservaRepository;

    public function __construct($reservaRepository){
        $this->reservaRepository = $reservaRepository;
    }

    public function listarReservas(){
        $reservas = $this->reservaRepository->buscarReservas();
        require 'src/views/reservas.php';
    }

    public function deletarReserva($id){
        $this->reservaRepository->deletar($id);
        header('Location: /reservas');
    }

    public function adicionarReserva(){
        require 'src/views/adicionar-reserva.php';
    }

    public function salvarReserva(){
        $quarto_id = $_POST['quarto_id'];
        $cliente_id = $_POST['cliente_id'];
        $data_checkin = $_POST['data_checkin'];
        $data_checkout = $_POST['data_checkout'];
        $status = $_POST['status'];

        $reserva = new Reserva(null, $quarto_id, $cliente_id, $data_checkin, $data_checkout, $status);
        $this->reservaRepository->salvar($reserva);
        header('Location: /reservas');
    }

    public function editarReserva($id){
        $reserva = $this->reservaRepository->buscar($id);
        require 'src/views/editar-reserva.php';
    }

    public function atualizarReserva(){
        $id = $_POST['id'];
        $quarto_id = $_POST['quarto_id'];
        $cliente_id = $_POST['cliente_id'];
        $data_checkin = $_POST['data_checkin'];
        $data_checkout = $_POST['data_checkout'];
        $status = $_POST['status'];

        $reserva = new Reserva($id, $quarto_id, $cliente_id, $data_checkin, $data_checkout, $status);
        $this->reservaRepository->atualizar($reserva);
        header('Location: /reservas');
    }
}

?>