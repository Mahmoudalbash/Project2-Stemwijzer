<?php
include 'data.php';

$politieke_partijen = [
    "VVD" => ["eens", "oneens", "eens", "oneens", "oneens"],
    "PvdA" => ["oneens", "eens", "oneens", "eens", "eens"],
    "D66" => ["oneens", "eens", "oneens", "eens", "eens"],
    "GroenLinks" => ["oneens", "eens", "oneens", "eens", "eens"],
    "CDA" => ["eens", "eens", "oneens", "oneens", "eens"],
    "SP" => ["oneens", "eens", "oneens", "eens", "eens"],
    "PVV" => ["eens", "oneens", "eens", "oneens", "oneens"],
    "FVD" => ["eens", "oneens", "eens", "oneens", "oneens"],
    "CU" => ["oneens", "eens", "oneens", "oneens", "eens"],
    "PvdD" => ["oneens", "eens", "oneens", "eens", "eens"],
];

$antwoorden = [];
foreach ($_POST as $key => $value) {
    $antwoorden[] = $value;
}

$scores = [];
foreach ($politieke_partijen as $partij => $standpunten) {
    $score = 0;
    foreach ($standpunten as $index => $standpunt) {
        if ($antwoorden[$index] == $standpunt) {
            $score++;
        }
    }
    $scores[$partij] = $score;
}

arsort($scores);
$beste_partij = key($scores);

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultaat</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <div class="container">
        <h1>Uw Resultaat</h1>
        <p>De partij die het beste bij u past is: <strong><?php echo $beste_partij; ?></strong></p>
        <a href="Start.html">Terug naar de vragen</a>
    </div>
</body>
</html>
