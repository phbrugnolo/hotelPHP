<?php

require 'Database.php';

class adminDao
{

    public function getAdminByEmailAndPassword($email, $senha)
    {
        try {
            $pdo = Database::conectar();
            $stmt = $pdo->prepare('SELECT * FROM admins WHERE email = ?');
            $stmt->execute([$email]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }

        if ($admin && password_verify($senha, $admin['senha'])) {
            return $admin;
        }

        return false;
    }

    public function registrarAdmin($email, $senha)
    {

       try{ 
            $pdo = Database::conectar();
            $stmt = $pdo->prepare('INSERT INTO admins (email, senha) VALUES (?, ?)');
            $stmt->execute([$email, $senha]);
            return true;
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
            return false;
        }
       
    }
}
