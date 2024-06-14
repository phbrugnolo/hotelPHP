<?php
require_once './models/quarto.php';
require_once './DAL/quartoDao.php';



class QuartoController
{
    private $quartoDao;

    public function __construct()
    {
        $this->quartoDao = new QuartoDao();
    }

    public function create()
    {

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tipo = trim($_POST['tipo']);
            $descricao = trim($_POST['descricao']);
            $preco = trim($_POST['preco']);
            $disponibilidade = trim($_POST['disponibilidade']);
            $imagem = trim($_POST['imagem']);

            if (empty($tipo)) {
                $errors[] = "O tipo é obrigatório.";
            }

            if (empty($descricao)) {
                $errors[] = "A descrição é obrigatória.";
            }

            if (empty($preco)) {
                $errors[] = "O preço é obrigatório.";
            }

            if (empty($disponibilidade)) {
                $errors[] = "A disponibilidade é obrigatória.";
            }

            if (empty($imagem)) {
                $errors[] = "A imagem é obrigatória.";
            }

            if (empty($errors)) {
                $quarto = new Quarto(
                    0,
                    $tipo,
                    $descricao,
                    $preco,
                    $disponibilidade,
                    $imagem
                );



                $this->quartoDao->criar($quarto);
                header('Location: index.php?controller=quarto&action=list');
            }
        } else {
            include './views/quarto/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $quarto = new Quarto(
                $id,
                $_POST['tipo'],
                $_POST['descricao'],
                $_POST['preco'],
                $_POST['disponibilidade'],
                $_POST['imagem']
            );
            $this->quartoDao->atualizar($quarto);
            header('Location: index.php?controller=quarto&action=list');
        } else {
            $quarto = $this->quartoDao->listarUm($id);
            include './views/quarto/edit.php';
        }
    }

    public function delete($id)
    {
        $this->quartoDao->deletar($id);
        header('Location: index.php?controller=quarto&action=list');
    }

    public function menu()
    {
        $dadosQuartos = $this->quartoDao->listarTodos();
        include './views/quarto/menu.php';
    }
}
