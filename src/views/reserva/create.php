<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cadastro</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Menu Principal</a>
            <a href="index.php?controller=quarto&action=menu">Quartos</a>
            <a href="index.php?controller=cliente&action=menu">Clientes</a>
        </nav>
    </header>
    <main>
        <section class="container-admin-banner">
            <h1>Cadastro de Reservas</h1>
            <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form action="index.php?controller=reserva&action=create" method="post">
                <?php if (!empty($errors)) : ?>
                    <div class="errors">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <label for="cliente_cpf">CPF do Cliente</label>
                <input name="cliente_cpf" type="text" data-mask="999.999.999-99" id="cliente_cpf" placeholder="Digite o identificador do cliente">
                <label for="tipo_quarto">TIPO do Quarto</label>
                <input name="tipo_quarto" type="text" id="tipo_quarto" placeholder="Digite o identificador do quarto">
                <label for="data_checkin">Data de Checkin</label>
                <input name="data_checkin" type="date" id="data_checkin">
                <label for="data_checkout">Data de Checkout</label>
                <input name="data_checkout" type="date" id="data_checkout">
                <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar Reserva" />
            </form>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../../js/index.js"></script>
</body>

</html>