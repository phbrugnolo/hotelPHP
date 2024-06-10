<?php

class ClienteRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Cliente(
            $dados['id'],
            $dados['nome'],
            $dados['email'],
            $dados['telefone'],
            $dados['endereco']
        );
    }

    public function buscarClientes()
    {
        $sql = "SELECT * FROM clientes ORDER BY nome";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($cliente){
            return $this->formarObjeto($cliente);
        },$dados);

        return $todosOsDados;
    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM clientes WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();

    }

    public function salvar(Cliente $cliente)
    {
        $sql = "INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $cliente->getNome());
        $statement->bindValue(2, $cliente->getEmail());
        $statement->bindValue(3, $cliente->getTelefone());
        $statement->bindValue(4,$cliente->getEndereco());
        $statement->execute();
    }

    public function buscar(int $id)
    {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    public function atualizar(Cliente $cliente)
    {
        $sql = "UPDATE clientes SET tipo = ?, descricao = ?, preco = ?, disponibilidade = ?, numero_camas = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $cliente->getNome());
        $statement->bindValue(2, $cliente->getEmail());
        $statement->bindValue(3, $cliente->getTelefone());
        $statement->bindValue(4,$cliente->getEndereco());
        $statement->bindValue(5, $cliente->getId());
        $statement->execute();
    }

}