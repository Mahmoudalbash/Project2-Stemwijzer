<?php include 'data.php'; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politieke Partijen</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
    <script defer src="script.js"></script>
</head>
<body> <!-- Add the dark-mode class to enable dark mode -->
<div class="top-banner">
        <img src="images/logo-met-text-rechts.svg" alt="Logo met text rechts" class="logo-left">
    </div>
    <header>
        <nav>
            <a href="Start.html">Start</a>
            <a href="Nieuws.html">Nieuws</a>
            <a href="stemwijzer.php">Stellingen</a>
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
        <h2 class="page-title">Politieke Partijen</h2>
        <table class="party-table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Zetels</th>
                    <th>Ideologie</th>
                    <th>Partijleider</th>
                    <th>Oprichtingsjaar</th>
                    <th>Website</th>
                    <th>Contactinformatie</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($partijen)) : ?>
                    <?php foreach ($partijen as $partij): ?>
                        <tr>
                            <td><?= htmlspecialchars($partij['naam']); ?></td>
                            <td><?= htmlspecialchars($partij['zetels']); ?></td>
                            <td><?= htmlspecialchars($partij['ideologie']); ?></td>
                            <td><?= htmlspecialchars($partij['partijleider']); ?></td>
                            <td><?= htmlspecialchars($partij['oprichtingsjaar']); ?></td>
                            <td><a href="<?= htmlspecialchars($partij['website']); ?>"><?= htmlspecialchars($partij['website']); ?></a></td>
                            <td><?= htmlspecialchars($partij['contactinformatie']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">Geen gegevens gevonden</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
