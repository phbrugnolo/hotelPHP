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
    <main>
        <h2>Tipos de Quarto</h2>
        <section class="container-menu">
            <div class="container-menu-titulo">
                <h3>Opções de Quato</h3>
                <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
            </div>
            <div class="container-menu-itens">
                <?php foreach ($dadosReservas as $reserva): ?>
                    <div class="container-itens">
                    <table>
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Quarto</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $reserva['cliente_id'] ?></td>
                                    <td><?= $reserva['quarto_id'] ?></td> 
                                    <td><?= $reserva['data_checkin'] ?></td> 
                                    <td><?= $reserva['data_checkout'] ?></td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>
