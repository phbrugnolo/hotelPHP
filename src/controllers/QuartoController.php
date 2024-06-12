<?php
    require_once './models/Quarto.php';
    require_once './DAL/QuartoDao.php';

    class QuartoController
    {
        private $quartoDao;

        public function __construct()
        {
            $this->quartoDao = new QuartoDao();
        }

        public function create()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $quarto = new Quarto(
                    0, // O ID será gerado pelo banco de dados
                    $_POST['tipo'],
                    $_POST['descricao'],
                    $_POST['preco'],
                    $_POST['disponibilidade']
                );
                $this->quartoDao->criar($quarto);
                header('Location: index.php?controller=quarto&action=list');
            } else {
                include './src/views/quarto/criarQurto.php';
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
                    $_POST['disponibilidade']
                );
                $this->quartoDao->atualizar($quarto);
                header('Location: index.php?controller=quarto&action=list');
            } else {
                $quarto = $this->quartoDao->listarUm($id);
                include './src/views/quarto/editarQuarto.php';
            }
        }

        public function list()
        {
            $quartos = $this->quartoDao->listarTodos();
            include '.src/views/quarto/listarQuartos.php';
        }

        public function show($id)
        {
            $quarto = $this->quartoDao->listarUm($id);
            include './src/views/quarto/mostrarQuarto.php';
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
?>
