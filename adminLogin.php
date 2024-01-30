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
    include 'header.php';
    ?>
    <main>
        <form id="login-section" method="post" action="index.php">
            <fieldset>
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username">
            </fieldset>
            <fieldset>
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password">
            </fieldset>
            <input type="submit" id="login-button" value="Login" name="login">
        </form>
    </main>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $getUserInfoSql = "SELECT Gebruikersnaam, Salt, Hashed_Wachtwoord FROM Gebruikers WHERE Gebruikersnaam = ?";
    $stmt = $conn->prepare($getUserInfoSql);
    $stmt->execute([$username]);
    $row = $stmt->fetch();

    if ($row) {
        $hashedPassword = $row['Hashed_Wachtwoord'];
        $salt = $row['Salt'];

        $saltedPassword = $salt . $password;

        if (password_verify($saltedPassword, $hashedPassword)) {
            $_SESSION['username'] = $row['Gebruikersnaam'];
            $sql = "UPDATE Gebruikers SET Laatste_Login = NOW() WHERE Gebruikersnaam = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            header("Location: uitleningen.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
?>
</html>