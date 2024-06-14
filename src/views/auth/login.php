<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="/css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="/img/icone-serenatto.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Serenatto - Login</title>
</head>

<body>
  <main>
    <section class="container-admin-banner">
      <h1>Login Serenatto</h1>
      <img class="ornaments" src="../../../img/ornaments.png" alt="ornaments">
    </section>
    <section class="container-form">
      <form method="POST" action="/src/controllers/loginController.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <input type="submit" value="Login">
      </form>
    </section>
    <h2 class="registro">Não possui uma conta? <a href="/src/views/auth/register.php">Registre-se</a></h2>
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
      echo '<h3 class="error">Email ou senha inválidos.</h3>';
    }
    ?>
  </main>
</body>

</html>