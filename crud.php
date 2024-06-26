<?php
include 'config.php';

$stemwijzer = new Stemwijzer();

// Voeg nieuwe partij toe
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_partij'])) {
    $naam = $_POST['naam'];
    $standpunten = $_POST['standpunten'];
    $stemwijzer->addPartij($naam, $standpunten);
}

// Haal alle partijen op
$partijen = $stemwijzer->selectAllPartijen();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pagina</title>
    <link rel="stylesheet" href="crud_styles.css">
</head>
<body>
    <div class="container">
        <h1>Partijen Beheren</h1>
        
        <!-- Voeg nieuwe partij toe -->
        <form method="post" action="">
            <h2>Nieuwe Partij Toevoegen</h2>
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>
            <label for="standpunten">Standpunten:</label>
            <textarea id="standpunten" name="standpunten" required></textarea>
            <input type="submit" name="add_partij" value="Toevoegen">
        </form>

        <h2>Bestaande Partijen</h2>
        <table>
            <tr>
                <th>Naam</th>
                <th>Standpunten</th>
                <th>Acties</th>
            </tr>
            <?php foreach ($partijen as $partij) { ?>
                <tr>
                    <td><?php echo $partij['naam']; ?></td>
                    <td><?php echo $partij['standpunten']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $partij['id']; ?>">Bewerken</a>
                        <a href="delete.php?id=<?php echo $partij['id']; ?>" onclick="return confirm('Weet u zeker dat u deze partij wilt verwijderen?');">Verwijderen</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>



