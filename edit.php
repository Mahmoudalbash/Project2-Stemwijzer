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

// Haal vraag ID op uit de query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $vraagData = $stemwijzer->getVraagById($id);
} else {
    header("Location: read.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vraag = $_POST['vraag'];

    // Verzamel eens-partijen
    $eens_partijen = isset($_POST['eens']) ? $_POST['eens'] : [];
    $eens = implode(',', $eens_partijen);

    // Verzamel oneens-partijen
    $oneens_partijen = isset($_POST['oneens']) ? $_POST['oneens'] : [];
    $oneens = implode(',', $oneens_partijen);

    // Verzamel weetniet-partijen
    $weetniet_partijen = isset($_POST['weetniet']) ? $_POST['weetniet'] : [];
    $weetniet = implode(',', $weetniet_partijen);

    $stemwijzer->updateVraagMetPartijen($id, $vraag, $eens_partijen, $oneens_partijen, $weetniet_partijen);
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
            <input type="hidden" name="id" value="<?php echo $vraagData['id']; ?>">
            
            <label for="vraag">Vraag:</label><br>
            <textarea id="vraag" name="vraag" rows="4" cols="50" required><?php echo $vraagData['vraag']; ?></textarea><br>

            <label for="eens">Scenario voor Eens:</label><br>
            <?php $eens_partijen = explode(',', $vraagData['eens']); ?>
            <?php foreach ($partijen as $key => $partij) : ?>
                <input type="checkbox" id="eens_<?php echo $key; ?>" name="eens[]" value="<?php echo $partij; ?>" <?php echo in_array($partij, $eens_partijen) ? 'checked' : ''; ?>>
                <label for="eens_<?php echo $key; ?>"><?php echo $partij; ?></label><br>
            <?php endforeach; ?><br>

            <label for="oneens">Scenario voor Oneens:</label><br>
            <?php $oneens_partijen = explode(',', $vraagData['oneens']); ?>
            <?php foreach ($partijen as $key => $partij) : ?>
                <input type="checkbox" id="oneens_<?php echo $key; ?>" name="oneens[]" value="<?php echo $partij; ?>" <?php echo in_array($partij, $oneens_partijen) ? 'checked' : ''; ?>>
                <label for="oneens_<?php echo $key; ?>"><?php echo $partij; ?></label><br>
            <?php endforeach; ?><br>

            <label for="weetniet">Scenario voor Weet ik niet:</label><br>
            <?php $weetniet_partijen = explode(',', $vraagData['weetniet']); ?>
            <?php foreach ($partijen as $key => $partij) : ?>
                <input type="checkbox" id="weetniet_<?php echo $key; ?>" name="weetniet[]" value="<?php echo $partij; ?>" <?php echo in_array($partij, $weetniet_partijen) ? 'checked' : ''; ?>>
                <label for="weetniet_<?php echo $key; ?>"><?php echo $partij; ?></label><br>
            <?php endforeach; ?><br>

            <input type="submit" value="Bewerken">
        </form>
    </div>
</body>
</html>





