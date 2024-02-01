<?php
if (!isset($_SESSION['username'])) {
    echo '<header>
<img src="./images/logo.png">
<nav id="navigation">
    <a href="index.php">Home</a>
    <a href="recepten.php">Recepten</a>
    <a href="overons.php">Over ons</a>
    <a href="contact.php">Contact</a>
</nav>
<nav id="adminnav">
    <a href="adminLogin.php">Log in</a>
</nav>
</header>';
} else {
    echo '<header>
    <img src="./images/logo.png">
    <nav id="navigation">
        <a href="index.php">Home</a>
        <a href="recepten.php">Recepten</a>
        <a href="overons.php">Over ons</a>
        <a href="contact.php">Contact</a>
    </nav>
    <nav id="adminnav">
    <form id="logout-form" method="post">
        <a href="adminRecept.php">Recepten</a>
        <a href="adminPanel.php">Gebruikers</a>
            <button type="submit" name="logout-button" id="logout-button">Log uit</button>
        </form>
    </header>';
}

if(isset($_POST['logout-button'])) {
    unset($_SESSION['username']);
    header('Location: index.php');
}
?>