<?php
// Configurações do banco de dados
$host = 'localhost';  // Pode ser 'localhost' ou o IP do seu servidor MySQL
$db   = 'hotel';  // Nome do banco de dados que você criou no MySQL Workbench
$user = 'root';  // Seu usuário do MySQL
$pass = 'admin123';  // Sua senha do MySQL
$charset = 'utf8mb4';

// Configurações de DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Conexão bem-sucedida!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
