<?php 

    class Quarto{
        public function __construct(
            private int $id, 
            private string $tipo, 
            private string $descricao, 
            private float $preco, 
            private string $disponibilidade,
            private string $imagem) {} 

        public function __get($propriedade)
        {
            return $this->$propriedade;
        }

        public function __set($propriedade, $valor)
        {
            $this->$propriedade = $valor;
        }

        public function getImagemDiretorio(): string
        {
            return "img/".$this->imagem;
        }

        public function getPrecoFormatado():string
        {
            return "R$ " . number_format($this->preco, 2);
        }
    }

?>