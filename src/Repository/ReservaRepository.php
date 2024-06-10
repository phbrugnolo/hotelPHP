<?php

class ReservaRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Reserva(
            $dados['id'],
            $dados['cliente_id'],
            $dados['quarto_id'],
            $dados['data_checkin'],
            $dados['data_checkout'],
            $dados['status']
        );
    }

    public function buscarReservas()
    {
        $sql = "SELECT * FROM reservas ORDER BY data_checkin";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($reserva){
            return $this->formarObjeto($reserva);
        },$dados);

        return $todosOsDados;
    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM reservas WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();

    }

    public function salvar(Reserva $reserva)
    {
        $sql = "INSERT INTO reservas (tipo, nome, descricao, preco, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $reserva->getClienteId());
        $statement->bindValue(2, $reserva->getQuartoId());
        $statement->bindValue(3, $reserva->getDataCheckin());
        $statement->bindValue(4,$reserva->getDataCheckout());
        $statement->bindValue(5, $reserva->getStatus());
        $statement->execute();
    }

    public function buscar(int $id)
    {
        $sql = "SELECT * FROM reservas WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    public function atualizar(Reserva $reserva)
    {
        $sql = "UPDATE reservas SET tipo = ?, nome = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $reserva->getClienteId());
        $statement->bindValue(2, $reserva->getQuartoId());
        $statement->bindValue(3, $reserva->getDataCheckin());
        $statement->bindValue(4,$reserva->getDataCheckout());
        $statement->bindValue(5, $reserva->getStatus());
        $statement->bindValue(6, $reserva->getId());
        $statement->execute();
    }


}