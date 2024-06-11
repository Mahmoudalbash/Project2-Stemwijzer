<?php
include 'data.php';

$stemwijzer = new Stemwijzer();
$vragen = $stemwijzer->selectAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stemwijzer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Stelling</h1>
        <form action="result.php" method="post" id="stemwijzer-form">
            <?php foreach ($vragen as $index => $row) { ?>
                <div class="question" id="question_<?php echo $index; ?>" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                    <p><?php echo $row["vraag"]; ?></p>
                    <div class="options">
                        <label class="option eens">
                            <input type="radio" name="vraag_<?php echo $row["id"]; ?>" value="eens" onclick="showNextQuestion(<?php echo $index; ?>)"> Eens
                        </label>
                        <label class="option oneens">
                            <input type="radio" name="vraag_<?php echo $row["id"]; ?>" value="oneens" onclick="showNextQuestion(<?php echo $index; ?>)"> Oneens
                        </label>
                        <label class="option weetniet">
                            <input type="radio" name="vraag_<?php echo $row["id"]; ?>" value="weet niet" onclick="showNextQuestion(<?php echo $index; ?>)"> Weet ik niet
                        </label>
                    </div>
                </div>
            <?php } ?>
            <div id="submit-section" style="display: none;">
                <input type="submit" value="Verstuur">
            </div>
        </form>
    </div>
</body>
</html>


