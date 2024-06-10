<?php
class Admin {
    private $id;
    private $email;
    private $senha;

    public function __construct($id, $email, $senha) {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }
}
?>
