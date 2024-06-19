<?php
include 'data.php';

$stemwijzer = new Stemwijzer($pdo);

// List of political parties
$parties = ["VVD", "PvdA", "CDA", "D66", "GroenLinks", "SP", "PVV", "FvD"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vraag = $_POST['vraag'];
    $eens = $_POST['eens'];
    $oneens = $_POST['oneens'];
    $weetniet = $_POST['weetniet'];
    $stemwijzer->insert($vraag, $eens, $oneens, $weetniet);
    header("Location: read.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vraag Bewerken</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="container">
        <h1>Vraag Bewerken</h1>
        <form action="" method="post">
            <label for="vraag">Vraag:</label><br>
            <textarea id="vraag" name="vraag" rows="4" cols="50" required></textarea><br>
            <label for="eens">Scenario voor Eens:</label><br>
            <select id="eens" name="eens" required>
                <?php foreach ($parties as $party) : ?>
                    <option value="<?= $party ?>"><?= $party ?></option>
                <?php endforeach; ?>
            </select><br>
            <label for="oneens">Scenario voor Oneens:</label><br>
            <select id="oneens" name="oneens" required>
                <?php foreach ($parties as $party) : ?>
                    <option value="<?= $party ?>"><?= $party ?></option>
                <?php endforeach; ?>
            </select><br>
            <label for="weetniet">Scenario voor Weet ik niet:</label><br>
            <select id="weetniet" name="weetniet" required>
                <?php foreach ($parties as $party) : ?>
                    <option value="<?= $party ?>"><?= $party ?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="submit" value="Toevoegen">
        </form>
    </div>
</body>
</html>




