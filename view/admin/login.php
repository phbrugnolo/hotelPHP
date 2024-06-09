<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <h1>Admin Login</h1>
    <form action="../../controllers/AdminController.php" method="POST">
        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senha" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
