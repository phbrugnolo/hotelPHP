<?php
    require_once './database.php';
    class QuartoDao
    {
        public function criar(Quarto $quarto)
        {
            try {
                $pdo = Database::conectar();
                $sql = "INSERT INTO quartos (tipo, descricao, preco, disponibilidade) VALUES (?,?,?,?)";
                $statement = $pdo->prepare($sql);
                $statement->execute([$quarto->tipo, $quarto->descricao, $quarto->preco, $quarto->disponibilidade]);
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getMessage();
            }
        }

        public function listarUm($id)
        {
            try {
                $pdo = Database::conectar();
                $sql = "SELECT * FROM quartos WHERE id = ?";
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
                $sql = "SELECT * FROM quartos";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getMessage();
            }
        }

        public function atualizar(Quarto $quarto)
        {
            try {
                $pdo = Database::conectar();
                $sql = "UPDATE quartos SET tipo = ?, descricao = ?, preco = ?, disponibilidade = ? WHERE id = ?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$quarto->tipo, $quarto->descricao, $quarto->preco, $quarto->disponibilidade, $quarto->id]);
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getMessage();
            }
        }

        public function deletar(int $id)
        {
            try {
                $pdo = Database::conectar();
                $sql = "DELETE FROM quartos WHERE id = ?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$id]);
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getMessage();
            }
        }
    }
?>