<?php
require_once './models/cliente.php';
require_once './DAL/clienteDao.php';

class ClienteController
{
    private $clienteDao;

    public function __construct()
    {
        $this->clienteDao = new ClienteDao();
    }

    public function create()
    {
        $errors = $this->validate();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
            $nome = trim($_POST['nome']);
            $cpf = trim($_POST['cpf']);
            $telefone = trim($_POST['telefone']);

            $cliente = new Cliente(
                0, // O ID será gerado pelo banco de dados
                $nome,
                $cpf,
                $telefone
            );
            $this->clienteDao->criar($cliente);
            header('Location: index.php?controller=cliente&action=menu');
            exit();
        }

        include './views/cliente/create.php';
    }


    public function edit($id)
    {
        $errors = $this->validate();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
            $nome = trim($_POST['nome']);
            $cpf = trim($_POST['cpf']);
            $telefone = trim($_POST['telefone']);

            $cliente = new Cliente(
                $id,
                $nome,
                $cpf,
                $telefone
            );
            $this->clienteDao->atualizar($cliente);
            header('Location: index.php?controller=cliente&action=menu');
            exit();
        } else {
            $cliente = $this->clienteDao->listarUm($id);
        }

        include './views/cliente/edit.php';
    }

    public function delete($id)
    {
        $this->clienteDao->deletar($id);
        header('Location: index.php?controller=cliente&action=menu');
    }

    public function menu()
    {
        $dadosClientes = $this->clienteDao->listarTodos();
        include './views/cliente/menu.php';
    }

    private function validate()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome']);
            $cpf = trim($_POST['cpf']);
            $telefone = trim($_POST['telefone']);

            if (empty($nome)) {
                $errors[] = "O nome é obrigatório.";
            }

            if (empty($cpf)) {
                $errors[] = "O CPF é obrigatório.";
            }

            if (empty($telefone)) {
                $errors[] = "O telefone é obrigatório.";
            }
        }

        return $errors;
    }
}
