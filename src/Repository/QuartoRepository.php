<?php

class QuartoRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Quarto(
            $dados['id'],
            $dados['tipo'],
            $dados['descricao'],
            $dados['preco'],
            $dados['disponibilidade'],
            $dados['numero_camas'],
            $dados['imagem'],

        );
    }

    public function buscarQuartos()
    {
        $sql = "SELECT * FROM quartos ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($quarto){
            return $this->formarObjeto($quarto);
        },$dados);

        return $todosOsDados;
    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM quartos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();

    }

    public function salvar(Quarto $quarto)
    {
        $sql = "INSERT INTO quartos (tipo, nome, descricao, preco, disponibilidade, numero_camas, imagem) VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $quarto->getTipo());
        $statement->bindValue(2, $quarto->getDescricao());
        $statement->bindValue(3, $quarto->getPreco());
        $statement->bindValue(4,$quarto->getDisponibilidade());
        $statement->bindValue(5, $quarto->getNumeroCamas());
        $statement->bindValue(5, $quarto->getImagem());
        $statement->execute();
    }

    public function buscar(int $id)
    {
        $sql = "SELECT * FROM quartos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    public function atualizar(Quarto $quarto)
    {
        $sql = "UPDATE quartos SET tipo = ?, descricao = ?, preco = ?, disponibilidade = ?, numero_camas = ?, imagem = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $quarto->getTipo());
        $statement->bindValue(2, $quarto->getDescricao());
        $statement->bindValue(3, $quarto->getPreco());
        $statement->bindValue(4,$quarto->getDisponibilidade());
        $statement->bindValue(5, $quarto->getNumeroCamas());
        $statement->bindValue(6, $quarto->getImagem());
        $statement->bindValue(7, $quarto->getId());
        $statement->execute();
    }


}