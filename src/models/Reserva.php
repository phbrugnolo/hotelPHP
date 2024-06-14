<?php

class Reserva
{
    private int $id;
    private string $cliente_cpf;
    private string $tipo_quarto;
    private DateTime $data_checkin;
    private DateTime $data_checkout;

    public function __construct(int $id, string $cliente_cpf, string $tipo_quarto, string $data_checkin, string $data_checkout)
    {
        $this->id = $id;
        $this->cliente_cpf = $cliente_cpf;
        $this->tipo_quarto = $tipo_quarto;
        $this->data_checkin = new DateTime($data_checkin);
        $this->data_checkout = new DateTime($data_checkout);
    }

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }

    public function getDataCheckinAsString()
    {
        return $this->data_checkin->format('Y-m-d');
    }

    public function getDataCheckoutAsString()
    {
        return $this->data_checkout->format('Y-m-d');
    }

    public function getDataCheckinBR()
    {
        return $this->data_checkin->format('d/m/Y');
    }

    public function getDataCheckoutBR()
    {
        return $this->data_checkout->format('d/m/Y');
    }
}
