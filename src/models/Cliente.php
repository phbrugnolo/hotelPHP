<?php

class Cliente
{
    public function __construct(
        private int $id,
        private string $nome,
        private string $cpf,
        private string $telefone
    ) {}

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }
}
