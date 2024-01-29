<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <header>
        <section>
            <a href="index.php"><img src="images/logo.png" alt="Kamadiong logo" height="70vh"></a>
        </section>
        <section>
            <a href="#">Contact</a>
            <a href="#">Recepten</a>
        </section>
        <section>
            <a href="#"><img src="images/login_logo.png" alt="Login knop" height="70vh"></a>
        </section>
    </header>
    <form action="login_process.php" method="post">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>

