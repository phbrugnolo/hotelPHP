<?php
  session_start();

  if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    header('Location: ../views/login.php');
    exit;
  }

  require __DIR__ . "/../config/database.php";
  require __DIR__ . "/../models/Reserva.php";
  require __DIR__ . "/../repositories/ReservaRepository.php";
?>

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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="/img/logo-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Admin</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="/img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Admistração Serenatto</h1>
    <img class= "ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
  </section>
  <h2>Lista de Reservas</h2>

  <section class="container-table">
    <table> 
      <thead>
        <tr>
          <th>Cliente</th>
          <th>Quarto</th>
          <th>Data Checkin</th>
          <th>Data Checkout</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($reservas as $reserva): ?>
          <tr>
            <td><?= $reserva->getClienteId() ?></td>
            <td><?= $reserva->getQuartoId() ?></td>
            <td><?= $reserva->getDataCheckin() ?></td>
            <td><?= $reserva->getDataCheckout() ?></td>
            <td><a class="botao-editar" href="editar-reserva.php?id=<?= $reserva->getId() ?>">Editar</a></td>
            <td>
              <form action="excluir-reserva.php" method="post">
                  <input type="hidden" name="id" value="<?= $reserva->getId() ?>">
                <input type="submit" class="botao-excluir" value="Excluir">
              </form>
            </td>
          </tr>
      <?php endforeach; ?>


      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar-reserva.php">Fazer reserva</a>
  </section>
</main>
</body>
</html>