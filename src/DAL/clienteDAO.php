<?php

    require_once 'Database.php';

    class ClienteDao
    {
        public function criar(Cliente $cliente)
        {
            try{
                $pdo = Database::conectar();
                $sql = "INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?,?,?,?)";
                $statement = $pdo->prepare($sql);
                $statement->execute([$cliente->nome, $cliente->email, $cliente->telefone, $cliente->endereco]);
            }catch(PDOException $e){
                echo 'Erro: ' . $e->getMessage();
            }
        }

        public function listarUm($id)
        {
            try{
                $pdo = Database::conectar();
                $sql = "SELECT * FROM clientes WHERE id = ?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$id]);
                return $statement->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo 'Erro: ' . $e->getMessage();
            }
        }

        public function listarTodos()
        {
            try{
                $pdo = Database::conectar();
                $sql = "SELECT * FROM clientes";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo 'Erro: ' . $e->getMessage();
            }
        }

        public function atualizar(Cliente $cliente)
        {
            try{
                $pdo = Database::conectar();
                $sql = "UPDATE clientes SET nome = ?, email = ?, telefone = ?, endereco = ? WHERE id = ?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$cliente->nome, $cliente->email, $cliente->telefone, $cliente->endereco, $cliente->id]);
            }catch(PDOException $e){
                echo 'Erro: ' . $e->getMessage();
            }


        }

        public function deletar(int $id)
        {

            try {
                $pdo = Database::conectar();
                $sql = "DELETE FROM clientes WHERE id = ?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$id]);
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getMessage();
            }

        }
    }
?>
