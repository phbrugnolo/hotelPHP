<?php
class Reserva {
    private $conn;
    private $table_name = "reservas";

    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $checkin;
    public $checkout;
    public $quarto_tipo;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, email=:email, telefone=:telefone, checkin=:checkin, checkout=:checkout, quarto_tipo=:quarto_tipo, status='pendente'";
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->checkin = htmlspecialchars(strip_tags($this->checkin));
        $this->checkout = htmlspecialchars(strip_tags($this->checkout));
        $this->quarto_tipo = htmlspecialchars(strip_tags($this->quarto_tipo));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":checkin", $this->checkin);
        $stmt->bindParam(":checkout", $this->checkout);
        $stmt->bindParam(":quarto_tipo", $this->quarto_tipo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
