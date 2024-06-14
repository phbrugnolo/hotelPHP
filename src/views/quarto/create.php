<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/form.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cadastro</title>
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
        <section class="container-admin-banner">
            <h1>Cadastro de Quartos</h1>
            <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form action="index.php?controller=quarto&action=create" method="post" enctype="multipart/form-data">
                <?php if (!empty($errors)) : ?>
                    <div class="errors">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <label for="tipo">Tipo</label>

                <input name="tipo" type="text" id="tipo" placeholder="Digite o tipo do quarto" value="<?php echo htmlspecialchars($tipo ?? ''); ?>">


                <label for="descricao">Descrição</label>
                <input name="descricao" type="text" id="descricao" placeholder="Digite uma descrição" value="<?php echo htmlspecialchars($descricao ?? ''); ?>">


                <label for="preco">Preço</label>
                <input name="preco" type="text" id="preco" placeholder="Digite um valor" value="<?php echo htmlspecialchars($preco ?? ''); ?>">

                <label for="imagem">Envie uma imagem</label>
                <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

                <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar Quarto">
            </form>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../../js/index.js"></script>
</body>

</html>