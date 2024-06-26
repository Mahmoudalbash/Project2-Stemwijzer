<?php
include 'data.php';

$partijen = [
    "VVD" => "VVD",
    "PvdA" => "PvdA",
    "D66" => "D66",
    "GroenLinks" => "GroenLinks",
    "CDA" => "CDA",
    "SP" => "SP",
    "PVV" => "PVV",
    "FVD" => "FVD",
    "CU" => "CU",
    "PvdD" => "PvdD",
];

$stemwijzer = new Stemwijzer($pdo);






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vraag = $_POST['vraag'];

    // Verzamel eens-partijen
    $eens_partijen = isset($_POST['eens']) ? $_POST['eens'] : [];
    $oneens_partijen = isset($_POST['oneens']) ? $_POST['oneens'] : [];
    $weetniet_partijen = isset($_POST['weetniet']) ? $_POST['weetniet'] : [];

    // Voeg de vraag en partijen toe aan de database
    $stemwijzer->insertVraagMetPartijen($vraag, $eens_partijen, $oneens_partijen, $weetniet_partijen);

    header("Location: read.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vraag Toevoegen</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="container">
        <h1>Vraag Toevoegen</h1>
        <form action="" method="post">
            <label for="vraag">Vraag:</label><br>
            <textarea id="vraag" name="vraag" rows="4" cols="50" required></textarea><br>

            <label for="neens">Scenario voor eens:</label><br>
            <?php foreach ($partijen as $key => $partij) : ?>
                <input type="checkbox" id="oneens_<?php echo $key; ?>" name="oneens[]" value="<?php echo $partij; ?>">
                <label for="oneens_<?php echo $key; ?>"><?php echo $partij; ?></label><br>
            <?php endforeach; ?><br>

            <label for="oneens">Scenario voor Oneens:</label><br>
            <?php foreach ($partijen as $key => $partij) : ?>
                <input type="checkbox" id="oneens_<?php echo $key; ?>" name="oneens[]" value="<?php echo $partij; ?>">
                <label for="oneens_<?php echo $key; ?>"><?php echo $partij; ?></label><br>
            <?php endforeach; ?><br>

            <label for="weetniet">Scenario voor Weet ik niet:</label><br>
            <?php foreach ($partijen as $key => $partij) : ?>
                <input type="checkbox" id="weetniet_<?php echo $key; ?>" name="weetniet[]" value="<?php echo $partij; ?>">
                <label for="weetniet_<?php echo $key; ?>"><?php echo $partij; ?></label><br>
            <?php endforeach; ?><br>

            <input type="submit" value="Toevoegen">
        </form>
    </div>
</body>
</html>







