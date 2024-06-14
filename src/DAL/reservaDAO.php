<?php
    require_once 'Database.php';

    class ReservaDao
    {
        public function criar(Reserva $reserva)
        {
            try {
                $pdo = Database::conectar();
                $sql = "INSERT INTO reservas (clinte_cpf, tipo_quarto, data_checkin, data_checkout) VALUES (?,?,?,?,?)";
                $statement = $pdo->prepare($sql);
                $statement->execute([$reserva->clinte_cpf, $reserva->tipo_quarto, $reserva->data_checkin, $reserva->data_checkou]);
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
                $sql = "UPDATE reservas SET clinte_cpf = ?, tipo_quarto = ?, data_checkin = ?, data_checkout = ? WHERE id = ?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$reserva->clinte_cpf, $reserva->tipo_quarto, $reserva->data_checkin, $reserva->data_checkout, $reserva->status, $reserva->id]);
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
?>
