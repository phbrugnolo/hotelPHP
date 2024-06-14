<?php

    require 'Database.php';

    class adminDao
    {

        public function getAdminByEmail($email)
        {
            try {
                $pdo = Database::conectar();
                $stmt = $pdo->prepare('SELECT * FROM admins WHERE email = ?');
                $stmt->execute([$email]);
                $admin = $stmt->fetch(PDO::FETCH_ASSOC);
                return $admin;
            } catch (PDOException $e) {
                throw new PDOException("Usuário não encontrado");
            }
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
?>