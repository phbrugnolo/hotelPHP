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
            <a href="index.php?controller=reserva&action=menu">Reservas</a>
        </nav>
    </header>
    <main>
        <h2>Editar Reserva</h2>
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
            <label for="cliente_id">Identificador do Cliente</label>
            <input type="text" id="cliente_id" name="cliente_id" value="<?= $reserva['cliente_id'] ?>" >
            <label for="quarto_id">Identificador do Quarto</label>
            <input type="text" id="quarto_id" name="quarto_id" value="<?= $reserva['quarto_id'] ?>" >
            <label for="data_checkin">Data de Checkin</label>
            <input type="date" id="data_checkin" name="data_checkin" value="<?= $reserva['data_checkin'] ?>" >
            <label for="data_checkout">Data de Checkout</label>
            <input type="date" id="data_checkout" name="data_checkout" value="<?= $reserva['data_checkout'] ?>">
            <button type="submit">Salvar</button>
        </form>
    </main>
</body>

</html>