<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/show.css">
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
        <img class= "ornaments" src="../../../img/ornaments.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form action="index.php?controller=reserva&action=create" method="post">
            <label for="cliente_id">Identificador do Cliente</label>
            <input name="cliente_id" type="text" id="cliente_id" placeholder="Digite o nome do cliente" required>
            <label for="quarto_id">Identificador do Quarto</label>
            <input name="quarto_id" type="text" id="quarto_id" placeholder="Digite um quarto" required>
            <label for="checkin">Data de Checkin</label>
            <input name="checkin" type="date" id="checkin" required>
            <label for="checkout">Data de Checkout</label>
            <input name="checkout" type="date" id="checkout">
            <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar Reserva"/>
            <div class="container-radio">
                <div>
                    <label for="pendente">Pendente</label>
                    <input type="radio" id="pendente" name="enum" checked>
                </div>
                <div>
                    <label for="almoco">Confirmada</label>
                    <input type="radio" id="almoco" name="enum">
                </div>
                <div>
                    <label for="almoco">Cancelada</label>
                    <input type="radio" id="almoco" name="enum">
                </div>
            </div>
        </form>
    </section>
</main>
</body>
</html>