<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Pagina</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>
<body>
    <div class="top-banner">
        <img src="images/logo-met-text-rechts.svg" alt="Logo met tekst rechts" class="logo-left">
    </div>
    <header>
        <nav>
            <a href="Start.html">Start</a>
            <a href="Nieuws.html">Nieuws</a>
            <a href="stemwijzer.php">Stellingen</a>
            <a href="Over_partijen.php">Over de partijen</a>
            <a href="Over_ons.html">Over ons</a>
            <a href="Opties.html">Opties</a>
            <a href="Account.php">Account</a>
            <label class="switch">
                <input type="checkbox" id="theme-toggle">
                <span class="slider round"></span>
            </label>
        </nav>
    </header>
    <div class="content">
        <!-- Display Messages -->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php } ?>

        <!-- Login Section -->
        <section id="login">
            <h2>Login</h2>
            <form action="gast_login.php" method="post">
                <label for="login-username">Gebruikersnaam:</label>
                <input type="text" id="login-username" name="username" required>
                
                <label for="login-password">Wachtwoord:</label>
                <input type="password" id="login-password" name="password" required>
                
                <button type="submit">Login</button>
            </form>
        </section>

        <!-- Registration Section -->
        <section id="register">
            <h2>Registreren</h2>
            <form action="register.php" method="post">
                <label for="reg-username">Gebruikersnaam:</label>
                <input type="text" id="reg-username" name="username" required>
                
                <label for="reg-password">Wachtwoord:</label>
                <input type="password" id="reg-password" name="password" required>
                
                <label for="reg-email">E-mail:</label>
                <input type="email" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Voer een geldig e-mailadres in, inclusief .com, .net, enz.">
                
                <button type="submit">Registreren</button>
            </form>
        </section>
    </div>
</body>
</html>
