<?php
// controllers/AuthController.php

require_once __DIR__ . '/../repositories/AdminRepository.php';

class AuthController {
    private $adminRepository;

    public function __construct($adminRepository) {
        $this->adminRepository = $adminRepository;
    }

    public function login($email, $password, $remember) {
        $admin = $this->adminRepository->findByEmail($email);

        if ($admin && password_verify($password, $admin->getSenha())) {
            session_start();
            $_SESSION['user_id'] = $admin->getId();
            $_SESSION['email'] = $admin->getEmail();

            if ($remember) {
                setcookie('user_id', $admin->getId(), time() + (86400 * 30), "/");
                setcookie('email', $admin->getEmail(), time() + (86400 * 30), "/");
            }

            header('Location: dashboard.php');
            exit;
        } else {
            return 'Credenciais inválidas.';
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        setcookie('user_id', '', time() - 3600, "/");
        setcookie('email', '', time() - 3600, "/");

        header('Location: index.php');
        exit;
    }
}
?>
