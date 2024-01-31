<?php

// Check if a user is logged in by verifying the existence of a session variable
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or any other page you prefer
    echo '<header>
<img src="./images/logo.png">
<nav id="navigation">
    <a href="index.php">Home</a>
    <a href="recepten.php">Recepten</a>
    <a href="overons.php">Over ons</a>
    <a href="contact.php">Contact</a>
</nav>
<nav id="adminnav">
    <a href="adminRecept.php">Recepten</a>
    <a href="adminPanel.php">Gebruikers</a>
    <a href="adminLogin.php">Log uit</a>
</nav>
</header>';
} else {
    echo '<header>
    <img src="./images/logo.png">
    <nav>
        <a href="index.html">Home</a>
        <a href="recepten.php">Recepten</a>
        <a href="overons.php">Over ons</a>
        <a href="contact.php">Contact</a>
    </nav>
    <nav>
        <a href="adminRecept.php">Recepten</a>
        <a href="adminPanel.php">Gebruikers</a>
        <a href="adminLogin.php">Log uit</a>
    </header>';
}
?>