<?php
include 'config.php';

$stemwijzer = new Stemwijzer();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_partij'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $standpunten = $_POST['standpunten'];
    $stemwijzer->updatePartij($id, $naam, $standpunten);
    header("Location: crud.php");
    exit();
}

$id = $_GET['id'];
$partij = $stemwijzer->selectPartijById($id);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partij Bewerken</title>
    <link rel="stylesheet" href="crud_styles.css">
</head>
<body>
    <div class="container">
        <h1>Partij Bewerken</h1>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $partij['id']; ?>">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" value="<?php echo $partij['naam']; ?>" required>
            <label for="standpunten">Standpunten:</label>
            <textarea id="standpunten" name="standpunten" required><?php echo $partij['standpunten']; ?></textarea>
            <input type="submit" name="update_partij" value="Bijwerken">
        </form>
    </div>
</body>
</html>




