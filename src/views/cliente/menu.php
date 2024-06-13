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
    <title>Serenatto - Cadastro</title>
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
        <h2>Lista de Clientes</h2>
        <section class="container-menu">
            <div class="container-menu-titulo">
                <h3>Clientes já cadastrados</h3>
                <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
            </div>
            <div class="container-menu-itens">
                <?php foreach ($dadosClientes as $cliente): ?>
                    <table class="tabelas">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $cliente['nome'] ?></td>
                                <td><?= $cliente['telefone'] ?></td>
                                <td>
                                    <button class="editar" onclick="location.href='index.php?controller=cliente&action=edit&id=<?= $cliente['id'] ?>'">Editar</button>
                                    <button class="excluir" onclick="if (confirm('Você tem certeza que deseja deletar este cliente?')) { location.href='index.php?controller=cliente&action=delete&id=<?= $cliente['id'] ?>' }">Excluir</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php endforeach; ?>
            </div>
            <a class="btn-adicionar" href="index.php?controller=cliente&action=create">Adicionar Cliente</a>
        </section>
    </main>
</body>
</html>
