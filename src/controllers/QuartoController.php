<?php 

class QuartoController {


    // Lembrar de fazer os formatadores de dinheiro, data e imagem

    private $quartoRepository;

    public function __construct($quartoRepository){
        $this->quartoRepository = $quartoRepository;
    }

    public function listarQuartos(){
        $quartos = $this->quartoRepository->buscarQuartos();
        require 'src/views/quartos.php';
    }

    public function deletarQuarto($id){
        $this->quartoRepository->deletar($id);
        header('Location: /quartos');
    }

    public function adicionarQuarto(){
        require 'src/views/adicionar-quarto.php';
    }

    public function salvarQuarto(){
        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $disponibilidade = $_POST['disponibilidade'];
        $numero_camas = $_POST['numero_camas'];
        $imagem = $_POST['imagem'];

        $quarto = new Quarto(null, $tipo, $descricao, $preco, $disponibilidade, $numero_camas, $imagem);
        $this->quartoRepository->salvar($quarto);
        header('Location: /quartos');
    }

    public function editarQuarto($id){
        $quarto = $this->quartoRepository->buscar($id);
        require 'src/views/editar-quarto.php';
    }

    public function atualizarQuarto(){
        $id = $_POST['id'];
        $tipo = $_POST['tipo'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $disponibilidade = $_POST['disponibilidade'];
        $numero_camas = $_POST['numero_camas'];
        $imagem = $_POST['imagem'];

        $quarto = new Quarto($id, $tipo, $descricao, $preco, $disponibilidade, $numero_camas, $imagem);
        $this->quartoRepository->atualizar($quarto);
        header('Location: /quartos');
    }
}

?>