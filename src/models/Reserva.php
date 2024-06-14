<?php 

    class Reserva{
        public function __construct(private int $id, 
        private string $cliente_cpf, 
        private string $tipo_quarto, 
        private string $data_checkin, 
        private string $data_checkout){
            $this->id = $id;
            $this->quarto_id = $cliente_cpf;
            $this->tipo_quarto = $tipo_quarto;
            $this->data_checkin = DateTime::createFromFormat('d/m/Y', $data_checkin);
            $this->data_checkout = $data_checkout;
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