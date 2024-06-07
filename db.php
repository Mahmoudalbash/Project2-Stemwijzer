<?php
$host = 'localhost';  // De hostname van de MySQL-server
$db   = 'Project2';   // De naam van de database
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
    $pdo = new PDO($dsn, $user, $pass, $options);  // Maak de PDO-instantie
    echo "Verbinding succesvol!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
