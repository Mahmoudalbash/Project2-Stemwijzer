<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: Account.php?error=Ongeldig e-mailadres");
        exit();
    }

    // Check if email domain is valid
    $pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/";
    if (!preg_match($pattern, $email)) {
        header("Location: Account.php?error=Ongeldig e-mailadres, inclusief .com, .net, enz.");
        exit();
    }

    // Check if user already exists
    $stmt = $pdo->prepare("SELECT * FROM gast_users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        header("Location: Account.php?error=Gebruiker bestaat al");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $pdo->prepare("INSERT INTO gast_users (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        header("Location: Account.html?success=Registratie geslaagd");
    } else {
        header("Location: Account.html?error=Registratie mislukt");
    }
    exit();
}
?>
