<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cadastrar Reserva</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <h1>Cadastro de Clientes</h1>
        <img class= "ornaments" src="../../../img/ornaments.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form action="index.php?controller=cliente&action=create" method="post">
        <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
            <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar Cliente"/>
        </form>
    </section>
</main>
</body>
</html>