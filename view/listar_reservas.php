<?php
include_once '../controllers/ReservaController.php';

$controller = new ReservaController();
$reservas = $controller->readAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Reservas</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <h1>Lista de Reservas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Tipo de Quarto</th>
            <th>Status</th>
        </tr>
        <?php
        while ($row = $reservas->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["telefone"] . "</td>";
            echo "<td>" . $row["checkin"] . "</td>";
            echo "<td>" . $row["checkout"] . "</td>";
            echo "<td>" . $row["quarto_tipo"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
