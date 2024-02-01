<?php 
session_start();
require_once('dbconnect.php');
include 'auth.php';

$sql = 'SELECT * FROM users WHERE id = '.$_GET['id'].'';
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
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
            $newSalt = bin2hex(random_bytes(16));
            $newSaltedPassword = $newSalt . $newPassword;
            $newHashedPassword = password_hash($newSaltedPassword, PASSWORD_BCRYPT);
                $sql = "UPDATE users SET username = ?, salt = ?, hashed_password = ? WHERE id = ".$user['id'];
                $stmt = $conn->prepare($sql);

                if ($stmt->execute([$newUsername, $newSalt, $newHashedPassword])) {
                    header('Location: adminPanel.php');
                } else {
                    echo "Bewerking onvoltooid.";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
    <script src="./js/ckeditor.js"></script>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main>
    <form method="post" action="" class="registration-form">
        <fieldset id="register-border">
        <legend>Bewerk gebruiker</legend>
                <fieldset>
                    <label for="username">Titel:</label>
                    <input type="text" id="username" name="username" required value="<?= $user['username'] ?>">
                </fieldset>
                <fieldset>
                    <label for="password">Beschrijving:</label>
                    <input type="password" id="password" name="password">
                </fieldset>
                <input id="new-recipe-button" type="submit" value="Bewerk Gebruiker" name="edit">
        </fieldset>
            </form>
    </main>
</body>
</html>