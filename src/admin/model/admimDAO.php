<?php

require_once __DIR__ . '/../models/Admin.php';

class AdminRepository {

    private $pdo;


    public function findByEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM admins WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $adminData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($adminData) {
            return new Admin($adminData['id'], $adminData['email'], $adminData['senha']);
        }

        return null;
    }
}
?>
