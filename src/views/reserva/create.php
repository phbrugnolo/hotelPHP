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
    <main>
        <section class="container-admin-banner">
            <h1>Cadastro de Reservas</h1>
            <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form action="index.php?controller=reserva&action=create" method="post">
                <label for="cliente_cpf">CPF do Cliente</label>
                <input name="cliente_cpf" type="text" id="cliente_cpf" placeholder="Digite o identificador do cliente" required>
                <label for="tipo_quarto">TIPO do Quarto</label>
                <input name="tipo_quarto" type="text" id="tipo_quarto" placeholder="Digite o identificador do quarto" required>
                <label for="data_checkin">Data de Checkin</label>
                <input name="data_checkin" type="date" id="data_checkin" required>
                <label for="data_checkout">Data de Checkout</label>
                <input name="data_checkout" type="date" id="data_checkout">
                <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar Reserva" />
            </form>
        </section>
    </main>
</body>
</html>