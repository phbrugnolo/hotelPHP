<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/show.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../../../img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto</title>
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
        <h2>Lista de Reservas</h2>
        <section class="container-menu">
            <div class="container-menu-titulo">
                <h3>Reservas Concluídas</h3>
                <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
            </div>
            <div class="container-menu-itens">
                <table class="tabelas">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Quarto</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dadosReservas as $reserva) : ?>
                            <tr>
                                <td><?= $reserva['cliente_id'] ?></td>
                                <td><?= $reserva['quarto_id'] ?></td>
                                <td><?= $reserva['data_checkin'] ?></td>
                                <td><?= $reserva['data_checkout'] ?></td>
                                <td>
                                    <button class="editar" onclick="location.href='index.php?controller=reserva&action=edit&id=<?= $reserva['id'] ?>'">Editar</button>
                                    <button class="excluir" onclick="if (confirm('Você tem certeza que deseja excluir esta reserva?')) { location.href='index.php?controller=reserva&action=delete&id=<?= $reserva['id'] ?>' }">Excluir</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="container-adicionar">
                <a class="btn-adicionar" href="index.php?controller=reserva&action=create">Criar Reserva</a>
            </div>
        </section>
    </main>
</body>
</html>