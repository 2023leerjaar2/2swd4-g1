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
        <form id="login-section" method="post">
            <fieldset id="register-border">
            <legend>Login</legend>
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
include 'dbconnect.php';
if (isset($_POST['login']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, Salt, Hashed_Password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        $hashedPassword = $user['Hashed_Password'];
        $salt = $user['Salt'];

        $saltedPassword = $salt . $password;
        echo 'salted password= '.$saltedPassword.'<br>';
        echo password_hash($saltedPassword, PASSWORD_BCRYPT).'<br>'; 
        echo $hashedPassword.'<br';

        if (password_verify($saltedPassword, $hashedPassword)) {
            session_start();
            $_SESSION['username'] = $user['username'];
            header("Location: adminRecept.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    }
}
?>
</html>