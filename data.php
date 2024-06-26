<?php
$host = '127.0.0.1';  // De hostname van de MySQL-server
$db   = 'project2';   // De naam van de database
$user = 'root';       // De gebruikersnaam voor de database
$pass = '';           // Het wachtwoord voor de database
$charset = 'utf8mb4'; // De tekenset

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";  // Data Source Name
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // Error mode
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch mode
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Emulate prepares
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Verbindingsfout: " . $e->getMessage();
    exit;
}

class Stemwijzer {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function selectAll() {
        $stmt = $this->pdo->query('SELECT * FROM vragen');
        return $stmt->fetchAll();
    }

    public function insert($vraag, $eens, $oneens, $weetniet) {
        $stmt = $this->pdo->prepare('INSERT INTO vragen (vraag, eens, oneens, weetniet) VALUES (:vraag, :eens, :oneens, :weetniet)');
        $stmt->execute(['vraag' => $vraag, 'eens' => $eens, 'oneens' => $oneens, 'weetniet' => $weetniet]);
    }

    public function update($id, $vraag, $eens, $oneens, $weetniet) {
        $stmt = $this->pdo->prepare('UPDATE vragen SET vraag = :vraag, eens = :eens, oneens = :oneens, weetniet = :weetniet WHERE id = :id');
        $stmt->execute(['vraag' => $vraag, 'eens' => $eens, 'oneens' => $oneens, 'weetniet' => $weetniet, 'id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM vragen WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function select($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM vragen WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function selectAllParties() {
        $stmt = $this->pdo->query('SELECT * FROM partijen');
        return $stmt->fetchAll();
    }
}




