<?php
    class Admin {
        public function __construct($id, $email, $senha) {
            $this->id = $id;
            $this->email = $email;
            $this->senha = $senha;
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
