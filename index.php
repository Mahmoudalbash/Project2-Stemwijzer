<?php
include 'data.php';

$stemwijzer = new Stemwijzer($pdo);  // Pass the PDO instance to the Stemwijzer constructor
$vragen = $stemwijzer->selectAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stemwijzer</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
<div class="top-banner">
        <img src="images/logo-met-text-rechts.svg" alt="Logo met text rechts" class="logo-left">
    </div>
<header>
        <nav>
            <a href="Start.html">Start</a>
            <a href="Nieuws.html">Nieuws</a>
            <a href="index.php">Stellingen</a>
            <a href="Over_partijen.php">Over de partijen</a>
            <a href="Over_ons.html">Over ons</a>
            <a href="Opties.html">Opties</a>
            <a href="Account.html">Account</a>
            <label class="switch">
                <input type="checkbox" id="theme-toggle">
                <span class="slider round"></span>
            </label>
        </nav>
    </header>
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
                <input type="submit" value="Verstuur" class="Submit_form">
            </div>

        </form>
    </div>

    <script>
        function showNextQuestion(currentIndex) {
    console.log('Current Index:', currentIndex);

    const currentQuestion = document.getElementById('question_' + currentIndex);
    console.log('Current Question:', currentQuestion);

    const nextQuestion = document.getElementById('question_' + (currentIndex + 1));
    console.log('Next Question:', nextQuestion);

    if (nextQuestion) {
        currentQuestion.style.display = 'none';
        nextQuestion.style.display = 'block';
    } else {
        currentQuestion.style.display = 'none';
        document.getElementById('submit-section').style.display = 'block';
    }
}
    </script>
</body>
</html>
