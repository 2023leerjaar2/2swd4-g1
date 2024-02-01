<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include 'dbconnect.php';
    session_start();
    include 'auth.php';
    include 'header.php';
    ?>
    <main>
        <form id="login-section" method="post">
            <fieldset id="register-border">
            <legend>Gebruiker registreren</legend>
            <fieldset>
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username">
            </fieldset>
            <fieldset>
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password">
            </fieldset>
            <input type="submit" id="login-button" value="Registreer" name="register">
        </form>
    </main>
<?php 
require_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    if (empty($newUsername)) {
        echo "Gebruikersnaam veld kan niet leeg zijn.";
    } elseif (empty($newPassword)) {
        echo "Wachtwoord veld kan niet leeg zijn.";
    } else {
        if (strlen($newPassword) < 6) {
            echo "Wachtwoord moet langer dan 6 tekens zijn.";
        } else {
            $salt = bin2hex(random_bytes(16));
            $saltedPassword = $salt . $newPassword;
            $hashedPassword = password_hash($saltedPassword, PASSWORD_BCRYPT);

            $sql = "SELECT COUNT(*) FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$newUsername]);
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo "Gebruikersnaam bestaat al!";
            } else {
                $sql = "INSERT INTO users (username, Salt, Hashed_password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);

                if ($stmt->execute([$newUsername, $salt, $hashedPassword])) {
                    header('Location: adminPanel.php');
                } else {
                    echo "Registratie onvoltooid.";
                }
            }
        }
    }
}
?>
</body>