<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Fazer uma Reserva</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h1>Fazer uma Reserva</h1>
    <form action="../controllers/ReservaController.php" method="POST" onsubmit="return validateForm()">
        Nome: <input type="text" name="nome" required><br>
        Email: <input type="email" name="email" required><br>
        Telefone: <input type="text" name="telefone" required><br>
        Check-in: <input type="date" name="checkin" required><br>
        Check-out: <input type="date" name="checkout" required><br>
        Tipo de Quarto: <select name="quarto_tipo" required>
            <option value="solteiro">Solteiro</option>
            <option value="duplo">Duplo</option>
            <option value="suite">Suíte</option>
        </select><br>
        <input type="submit" value="Reservar">
    </form>
    <script>
        function validateForm() {
            let checkin = new Date(document.forms[0]["checkin"].value);
            let checkout = new Date(document.forms[0]["checkout"].value);
            if (checkout <= checkin) {
                alert("A data de check-out deve ser após a data de check-in.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
