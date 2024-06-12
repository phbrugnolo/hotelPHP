<?php

class ReservaDAO
{
    public function criar(Reserva $reserva)
    {
        try {
            $pdo = Database::conectar();
            $sql = "INSERT INTO reservas (quarto_id, cliente_id, data_checkin, data_checkout, status) VALUES (?,?,?,?,?)";
            $statement = $pdo->prepare($sql);
            $statement->execute([$reserva->quarto_id, $reserva->cliente_id, $reserva->data_checkin, $reserva->data_checkout, $reserva->status]);
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
            $sql = "UPDATE reservas SET quarto_id = ?, cliente_id = ?, data_checkin = ?, data_checkout = ?, status = ? WHERE id = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$reserva->quarto_id, $reserva->cliente_id, $reserva->data_checkin, $reserva->data_checkout, $reserva->status, $reserva->id]);
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