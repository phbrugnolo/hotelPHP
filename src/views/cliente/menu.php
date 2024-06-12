<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Menu Principal</a>
            <a href="../src/views/quarto/menu.php">Quartos</a>
            <a href="../src/views/reserva/menu.php">Reservas</a>
        </nav>
    </header>
    <main>
        <h2>Lista de Clientes</h2>
        <section class="container-menu">
            <div class="container-menu-titulo">
                <h3>Clientes já cadastrados</h3>
                <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
            </div>
            <div class="container-menu-itens">
                <?php foreach ($dadosClientes as $cliente): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $cliente['nome'] ?></td>
                                <td><?= $cliente['telefone'] ?></td> 
                            </tr>
                        </tbody>
                    </table>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>
