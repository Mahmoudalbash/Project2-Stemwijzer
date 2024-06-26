<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = $_POST['naam'];
    $standpunten = $_POST['standpunten'];

    $stmt = $pdo->prepare("INSERT INTO politieke_partijen (naam, standpunten) VALUES (?, ?)");
    $stmt->execute([$naam, $standpunten]);

    header('Location: partijen.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partij Toevoegen</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="container">
        <h1>Partij Toevoegen</h1>
        <form action="create_partij.php" method="post">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>
            <label for="standpunten">Standpunten:</label>
            <textarea id="standpunten" name="standpunten" required></textarea>
            <input type="submit" value="Toevoegen">
        </form>
    </div>
</body>
</html>






