<?php

// Check if a user is logged in by verifying the existence of a session variable
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or any other page you prefer
    header("Location: index.php");
    exit(); // Ensure the script stops here
}
?>