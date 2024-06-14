<?php
require_once 'Database.php';

class ReservaDao
{
    public function criar(Reserva $reserva)
    {
        try {
            $pdo = Database::conectar();
            $sql = "INSERT INTO reservas (cliente_cpf, tipo_quarto, data_checkin, data_checkout) VALUES (?, ?, ?, ?)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                $reserva->cliente_cpf,
                $reserva->tipo_quarto,
                $reserva->getDataCheckinAsString(),
                $reserva->getDataCheckoutAsString()
            ]);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function listarUm($id)
    {
        try {
            $pdo = Database::conectar();
            $sql = "SELECT * FROM reservas WHERE id = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function listarTodos()
    {
        try {
            $pdo = Database::conectar();
            $sql = "SELECT * FROM reservas";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function atualizar(Reserva $reserva)
    {
        try {
            $pdo = Database::conectar();
            $sql = "UPDATE reservas SET cliente_cpf = ?, tipo_quarto = ?, data_checkin = ?, data_checkout = ? WHERE id = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                $reserva->cliente_cpf,
                $reserva->tipo_quarto,
                $reserva->getDataCheckinAsString(),
                $reserva->getDataCheckoutAsString(),
                $reserva->id
            ]);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function deletar(int $id)
    {
        try {
            $pdo = Database::conectar();
            $sql = "DELETE FROM reservas WHERE id = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$id]);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}
