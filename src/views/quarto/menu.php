<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="/css/show.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Menu Principal</a>
            <a href="index.php?controller=cliente&action=menu">Clientes</a>
            <a href="index.php?controller=reserva&action=menu">Reservas</a>
        </nav>
    </header>
    <main>
        <h2>Lista de Quartos</h2>
        <section class="container-menu">
            <div class="container-menu-titulo">
                <h3>Opções de Quarto</h3>
                <img class="ornaments" src="/img/ornaments.png" alt="ornaments">
            </div>
            <div class="container-menu-itens">
                <?php foreach ($dadosQuartos as $quarto) : ?>
                    <div class="container-itens">
                        <div class="container-foto">
                            <img src="<?= htmlspecialchars("../../../img/" . $quarto['imagem']) ?>" alt="<?= htmlspecialchars($quarto['tipo']) ?>">
                        </div>
                        <p><?= htmlspecialchars($quarto['tipo']) ?></p>
                        <p><?= htmlspecialchars($quarto['descricao']) ?></p>
                        <p><?= "R$ " . htmlspecialchars(number_format($quarto['preco'], 2, ',', '.')) ?></p>
                        <div class="actions-container">
                            <a class="edit" href="index.php?controller=quarto&action=edit&id=<?= htmlspecialchars($quarto['id']) ?>">Editar</a>
                            <a class="delete" href="index.php?controller=quarto&action=delete&id=<?= htmlspecialchars($quarto['id']) ?>" onclick="return confirm('Tem certeza que deseja deletar este quarto?')">Deletar</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="container-adicionar">
                <a class="btn-adicionar" href="index.php?controller=quarto&action=create">Cadastrar Quarto</a>
            </div>
        </section>
    </main>
</body>

</html>