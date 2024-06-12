<?php 

    class Reserva{
        public function __construct(private int $id, 
        private int $quarto_id, 
        private int $cliente_id, 
        private DateTime $data_checkin, 
        private DateTime $data_checkout, 
        private string $status){
            $this->id = $id;
            $this->quarto_id = $quarto_id;
            $this->cliente_id = $cliente_id;
            $this->data_checkin = $data_checkin;
            $this->data_checkout = $data_checkout;
            $this->status = $status;
        }

        public function __get($propriedade)
        {
            return $this->$propriedade;
        }

        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }
    }
?>