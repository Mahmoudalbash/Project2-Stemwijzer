<?php

class Stemwijzer
{
    private $conn = "mysql:host=localhost;dbname=stemwijzer";
    private $user = "root";
    private $pass = "";
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->conn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function selectAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM vragen;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAllPartijen()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM politieke_partijen;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectPartijById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM politieke_partijen WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPartij($naam, $standpunten)
    {
        $stmt = $this->pdo->prepare("INSERT INTO politieke_partijen (naam, standpunten) VALUES (:naam, :standpunten);");
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':standpunten', $standpunten);
        $stmt->execute();
    }

    public function updatePartij($id, $naam, $standpunten)
    {
        $stmt = $this->pdo->prepare("UPDATE politieke_partijen SET naam = :naam, standpunten = :standpunten WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':standpunten', $standpunten);
        $stmt->execute();
    }

    public function deletePartij($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM politieke_partijen WHERE id = :id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function selectAllParties() {
        $stmt = $this->pdo->query('SELECT * FROM partijen');
        return $stmt->fetchAll();
    }
}


?>
