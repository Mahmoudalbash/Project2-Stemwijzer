<?php
// Include the config.php file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stemwijzer = new Stemwijzer();
    $pdo = $stemwijzer->getPdo();

    $stmt = $pdo->prepare("SELECT * FROM gast_users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: Account.php?success=Login%20succesvol!");
        } else {
            header("Location: Account.php?error=Ongeldig%20wachtwoord.");
        }
    } else {
        header("Location: Account.php?error=Gebruikersnaam%20bestaat%20niet.");
    }
}
?>
