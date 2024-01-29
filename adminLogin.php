<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>

    <?php require "helper.php";
    
    if (isset($_POST["gebruikersnaam"]) && isset($_POST["wachtwoord"])) {
        
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $wachtwoord = $_POST["wachtwoord"];
    
        
        $user = loginUser($gebruikersnaam, $wachtwoord, $conn);
    
        if ($user) {
            
            session_start();
            $_SESSION["gebruikersnaam"] = $gebruikersnaam;
            echo "Inloggen geslaagd. Welkom, $gebruikersnaam!";
            header("Location: adminPanel.php");
            exit();
        } else {
            
            echo "Inloggen mislukt. Controleer je gegevens.";
        }
    }
    ?>

</head>
<body>

    <?php include "header.php"; ?>

    <form action="" method="post">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>

