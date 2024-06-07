<?php include 'data.php'; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politieke Partijen</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Politieke Partijen</h1>
    <table>
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
</body>
</html>
