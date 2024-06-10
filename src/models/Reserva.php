<?php 

class Reserva{
    private $id;
    private $quarto_id;
    private $cliente_id;
    private $data_checkin;
    private $data_checkout;
    private $status;

    public function __construct($id, $quarto_id, $cliente_id, $data_checkin, $data_checkout, $status){
        $this->id = $id;
        $this->quarto_id = $quarto_id;
        $this->cliente_id = $cliente_id;
        $this->data_checkin = $data_checkin;
        $this->data_checkout = $data_checkout;
        $this->status = $status;
    }

    public function getId(){
        return $this->id;
    }

    public function getQuartoId(){
        return $this->quarto_id;
    }

    public function getClienteId(){
        return $this->cliente_id;
    }

    public function getDataCheckin(){
        return $this->data_checkin;
    }

    public function getDataCheckout(){
        return $this->data_checkout;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setQuartoId($quarto_id){
        $this->quarto_id = $quarto_id;
    }

    public function setClienteId($cliente_id){
        $this->cliente_id = $cliente_id;
    }

    public function setDataCheckin($data_checkin){
        $this->data_checkin = $data_checkin;
    }

    public function setDataCheckout($data_checkout){
        $this->data_checkout = $data_checkout;
    }

    public function setStatus($status){
        $this->status = $status;
    }
}
?>