<?php

    require __DIR__ . "/../config/database.php";
    require __DIR__ . "/../models/Reserva.php";
    require __DIR__ . "/../Repository/ReservaRepository.php";

    $reservaRepositorio = new ReservaRepository($pdo);
    $reservaRepositorio->deletar($_POST['id']);

    header("Location: admin.php");

?>