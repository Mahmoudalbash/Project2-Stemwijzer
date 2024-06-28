<?php
// Include the config.php file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $stemwijzer = new Stemwijzer();
    $pdo = $stemwijzer->getPdo();

    $stmt = $pdo->prepare("SELECT * FROM gast_users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        header("Location: Account.html?error=Gebruikersnaam%20of%20e-mail%20bestaat%20al.");
    } else {
        $stmt = $pdo->prepare("INSERT INTO gast_users (username, password, email) VALUES (:username, :password, :email)");
        if ($stmt->execute(['username' => $username, 'password' => $password, 'email' => $email])) {
            header("Location: Account.php?success=Registratie%20succesvol!");
        } else {
            header("Location: Account.php?error=Registratie%20mislukt.");
        }
    }
}
?>
