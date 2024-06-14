<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Serenatto - Registrar</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="/css/show.css">
  <link rel="stylesheet" href="/css/form.css">
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="/img/icone-serenatto.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<main>
    <section class="container-admin-banner">
        <h1>Registrar Serenatto</h1>
        <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form method="POST" action="/src/controllers/registerController.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <?php if (isset($_GET['error']) && $_GET['error'] == 'email'): ?>
                <div class="error-message">Por favor, insira um email válido.</div>
            <?php endif; ?>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">
            <?php if (isset($_GET['error']) && $_GET['error'] == 'senha'): ?>
                <div class="error-message">A senha deve ter pelo menos 6 caracteres.</div>
            <?php endif; ?>
            <input type="submit" value="Registrar">
        </form>
    </section>
    <h2 class="registro">Já possui uma conta? <a href="login.php">Login</a></h2>
    <?php
        if (isset($_GET['error']) && $_GET['error'] == 'registro') {
            echo '<div class="error-message">Erro ao registrar. Por favor, tente novamente.</div>';
        }
    ?>
</main>
</body>
</html>
