<?php 

class Quarto{

    private int $id;
    private string $tipo;
    private string $descricao;
    private float $preco;
    private string $disponibilidade;
    private int $numero_camas;

    public function __construct($id, $tipo, $descricao, $preco, $disponibilidade, $numero_camas) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->disponibilidade = $disponibilidade;
        $this->numero_camas = $numero_camas;
    }

    public function getId(){
        return $this->id;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function getDisponibilidade(){
        return $this->disponibilidade;
    }

    public function getNumero_camas(){
        return $this->numero_camas;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function setDisponibilidade($disponibilidade){
        $this->disponibilidade = $disponibilidade;
    }

    public function setNumero_camas($numero_camas){
        $this->numero_camas = $numero_camas;
    }
}

?>