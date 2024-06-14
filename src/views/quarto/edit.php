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
    <title>Serenatto - Editar</title>
</head>

<body>
    <main>
        <section class="container-admin-banner">
            <h1>Editar Quarto</h1>
            <img class="ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form action="index.php?controller=reserva&action=edit&id=<?= $cliente['id'] ?>" method="post">
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
                <input name="tipo" type="text" id="tipo" value="<?= $quarto['tipo'] ?>" placeholder="Digite o tipo do quarto">

                <label for="descricao">Descrição</label>
                <input name="descricao" type="text" id="descricao" value="<?= $quarto['descricao'] ?>" placeholder="Digite uma descrição">

                <label for="preco">Preço</label>
                <input name="preco" type="text" id="preco" value="<?= $quarto['preco'] ?>" placeholder="Digite um valor">

                <label for="imagem">Envie uma imagem</label>
                <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

                <input name="editar" type="submit" class="botao-cadastrar" value="Editar Quarto">
            </form>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/index.js"></script>
</body>

</html>