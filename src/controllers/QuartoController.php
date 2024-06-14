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
        $preco = floatval(str_replace(',', '.', $preco));
        
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $imagem = $_FILES['imagem'];
            
            $check = getimagesize($imagem['tmp_name']);
            if ($check === false) {
                $errors[] = "O arquivo enviado não é uma imagem válida.";
            }
            
            $uploadDir = $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/img/';
            $uploadFile = $uploadDir . basename($imagem['name']);
            
            if (!move_uploaded_file($imagem['tmp_name'], $uploadFile)) {
                $errors[] = "Erro ao mover o arquivo para o servidor.";
            }
        } else {
            $errors[] = "A imagem é obrigatória.";
        }

        $errors = array_merge($errors, $this->validate($tipo, $descricao, $preco));

        if (empty($errors)) {
            $quarto = new Quarto(
                0, // O ID será gerado pelo banco de dados
                $tipo,
                $descricao,
                $preco,
                $uploadFile // Caminho da imagem
            );

            $this->quartoDao->criar($quarto);
            header('Location: index.php?controller=quarto&action=list');
            exit();
        }
    }

    include './views/quarto/create.php';
}

private function validate($tipo, $descricao, $preco, $imagem = null)
{
    $errors = [];

    if (empty($tipo)) {
        $errors[] = "O tipo é obrigatório.";
    }

    if (empty($descricao)) {
        $errors[] = "A descrição é obrigatória.";
    }

    if (empty($preco)) {
        $errors[] = "O preço é obrigatório.";
    }

    if ($imagem && !is_uploaded_file($imagem['tmp_name'])) {
        $errors[] = "A imagem não foi enviada corretamente.";
    }

    return $errors;
}


    public function edit($id)
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = trim($_POST['tipo']);
            $descricao = trim($_POST['descricao']);
            $preco = trim($_POST['preco']);
            $imagem = trim($_POST['imagem']);

            $errors = $this->validate($tipo, $descricao, $preco, $imagem);

            if (empty($errors)) {
                $quarto = new Quarto(
                    $id,
                    $tipo,
                    $descricao,
                    $preco,
                    $imagem
                );

                $this->quartoDao->atualizar($quarto);
                header('Location: index.php?controller=quarto&action=list');
                exit();
            }
        } else {
            $quarto = $this->quartoDao->listarUm($id);
        }

        include './views/quarto/edit.php';
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
