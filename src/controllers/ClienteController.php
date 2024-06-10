<?php 

class ClienteController {
    
        private $clienteRepository;
    
        public function __construct($clienteRepository){
            $this->clienteRepository = $clienteRepository;
        }
    
        public function listarClientes(){
            $clientes = $this->clienteRepository->buscarClientes();
            require 'src/views/clientes.php';
        }
    
        public function deletarCliente($id){
            $this->clienteRepository->deletar($id);
            header('Location: /clientes');
        }
    
        public function adicionarCliente(){
            require 'src/views/adicionar-cliente.php';
        }
    
        public function salvarCliente(){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
    
            $cliente = new Cliente(null, $nome, $email, $telefone, $endereco);
            $this->clienteRepository->salvar($cliente);
            header('Location: /clientes');
        }
    
        public function editarCliente($id){
            $cliente = $this->clienteRepository->buscar($id);
            require 'src/views/editar-cliente.php';
        }
    
        public function atualizarCliente(){
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
    
            $cliente = new Cliente($id, $nome, $email, $telefone, $endereco);
            $this->clienteRepository->atualizar($cliente);
            header('Location: /clientes');
        }
}

?>