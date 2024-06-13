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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente(
                0, // O ID será gerado pelo banco de dados
                $_POST['nome'],
                $_POST['telefone']
            );
            $this->clienteDao->criar($cliente);
            header('Location: index.php?controller=cliente&action=menu');
        } else {
            include './views/cliente/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente(
                $id,
                $_POST['nome'],
                $_POST['telefone']
            );
            $this->clienteDao->atualizar($cliente);
            header('Location: index.php?controller=cliente&action=menu');
        } else {
            $cliente = $this->clienteDao->listarUm($id);
            include './views/cliente/edit.php';
        }
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
}
?>
