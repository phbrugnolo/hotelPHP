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
    <title>Serenatto - Editar</title>
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
            <h1>Editar Reserva</h1>
            <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
        </section>
        <section class="container-form">


            <form action="index.php?controller=reserva&action=edit&id=<?= $reserva['id'] ?>" method="post">
                <?php if (!empty($errors)) : ?>
                    <div class="errors">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <label for="cliente_cpf">Identificador do Cliente</label>
                <input type="text" id="cliente_cpf" name="cliente_cpf" value="<?= $reserva['cliente_cpf'] ?>">
                <label for="tipo_quarto">Identificador do Quarto</label>
                <input type="text" id="tipo_quarto" name="tipo_quarto" value="<?= $reserva['tipo_quarto'] ?>">
                <label for="data_checkin">Data de Checkin</label>
                <input type="date" id="data_checkin" name="data_checkin" value="<?= $reserva['data_checkin'] ?>">
                <label for="data_checkout">Data de Checkout</label>
                <input type="date" id="data_checkout" name="data_checkout" value="<?= $reserva['data_checkout'] ?>">
                <input name="editar" type="submit" class="botao-cadastrar" value="Editar Reserva">
            </form>
        </section>
    </main>
</body>

</html>