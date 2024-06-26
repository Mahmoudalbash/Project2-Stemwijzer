<?php
include 'data.php';

$stemwijzer = new Stemwijzer($pdo);
$vragen = $stemwijzer->getAllVragenMetPartijen();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vragen Overzicht</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="container">
        <h1>Vragen Overzicht</h1>
        <a href="add.php">Vraag toevoegen</a>
        <ul>
            <?php foreach ($vragen as $row) { ?>
                <li>
                    <p><?php echo htmlspecialchars($row["vraag"]); ?></p>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Bewerken</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Weet u zeker dat u deze vraag wilt verwijderen?');">Verwijderen</a>
                    <p>Eens: <?php echo htmlspecialchars($row['eens'] ?? ''); ?></p>
                    <p>Oneens: <?php echo htmlspecialchars($row['oneens'] ?? ''); ?></p>
                    <p>Weet ik niet: <?php echo htmlspecialchars($row['weetniet'] ?? ''); ?></p>
                </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>



