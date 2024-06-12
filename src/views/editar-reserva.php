<?php
    require __DIR__ . "/../config/database.php";
    require __DIR__ . "/../models/Reserva.php";
    require __DIR__ . "/../DAO/ReservaDAO.php";

    $reservaRepositorio = new ReservaDAO;

    if (isset($_POST['editar'])){
        $reserva = new Reserva(
          $_POST['id'], 
          $_POST['cliente_id'], 
          $_POST['quarto_id'],
          $_POST['data_checkin'], 
          $_POST['data_checkout'],
          $_POST['status']
          );

        // if (isset($_FILES['imagem'])){
        //     $reserva->setImagem(uniqid() . $_FILES['imagem']['name']);
        //     move_uploaded_file($_FILES['imagem']['tmp_name'], $reserva->getImagemDiretorio());
        // }


        $reservaRepositorio->atualizar($reserva);
        header("Location: admin.php");
    }else{
        $reserva = $reservaRepositorio->buscarReservas($_GET['id']);
    }
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
  <link rel="stylesheet" href="/css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="/img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Editar Reserva</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="/img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Editar Reserva</h1>
    <img class= "ornaments" src="/img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-form">
  <form method="post" enctype="multipart/form-data">

    <label for="quarto_id">Quarto</label>
    <input type="text" id="quarto_id" name="quarto_id" placeholder="Digite o ID do quarto" value="<?= $reserva->getQuartoId() ?>" required>

    <label for="cliente_id">Cliente</label>
    <input type="text" id="cliente_id" name="cliente_id" placeholder="Digite o ID do cliente" value="<?= $reserva->getClienteId() ?>" required>

    <label for="data_checkin">Data de Check-in</label>
    <input type="date" id="data_checkin" name="data_checkin" value="<?= $reserva->checkin ?>" required>

    <label for="data_checkout">Data de Check-out</label>
    <input type="date" id="data_checkout" name="data_checkout" value="<?= $reserva->getDataCheckout() ?>" required>

    <div class="container-radio">
      <div>
          <label for="reservado">Reservado</label>
          <input type="radio" id="reservado" name="status" value="Reservado" <?= $reserva->getStatus() == "Reservado" ? "checked" : "" ?>>
      </div>
      <div>
          <label for="ocupado">Ocupado</label>
          <input type="radio" id="ocupado" name="status" value="Ocupado" <?= $reserva->getStatus() == "Ocupado" ? "checked" : "" ?>>
      </div>
      <div>
          <label for="cancelado">Cancelado</label>
          <input type="radio" id="cancelado" name="status" value="Cancelado" <?= $reserva->getStatus() == "Cancelado" ? "checked" : "" ?>>
      </div>
    </div>

    <input type="hidden" name="id" value="<?= $reserva->getId() ?>">

    <input type="submit" name="editar" class="botao-cadastrar" value="Editar Reserva">
  </form>
</section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>