<?php

class Stemwijzer
{
    private $conn = "mysql:host=localhost;dbname=project2";
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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Add other CRUD methods here as needed
}

?>