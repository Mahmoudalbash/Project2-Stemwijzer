<?php

// Database configuratie (aanpassen indien nodig)
$host = 'localhost'; // MySQL hostnaam (meestal localhost)
$dbname = 'project2'; // Naam van de database
$username = 'root'; // MySQL gebruikersnaam
$password = ''; // MySQL wachtwoord (leeg laten als je geen wachtwoord hebt ingesteld)

// Verbinding maken met de database via PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}



class Stemwijzer {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllVragenMetStandpunten() {
        $stmt = $this->pdo->query("SELECT v.id, v.vraag, s.partij_naam, s.standpunt
                                   FROM vragen v
                                   JOIN standpunten s ON v.id = s.vraag_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStandpuntByVraagAndPartij($vraag_id, $partij_naam) {
        $stmt = $this->pdo->prepare("SELECT standpunt
                                     FROM standpunten
                                     WHERE vraag_id = ? AND partij_naam = ?");
        $stmt->execute([$vraag_id, $partij_naam]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
