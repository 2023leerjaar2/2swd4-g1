<?php
require "dbconnect.php";

function loginUser($gebruikersnaam, $wachtwoord) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM users WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");
    $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
    $stmt->bindParam(':wachtwoord', $wachtwoord);
    $stmt->execute();

    return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : false;
}


function readAllPosts() {
    global $conn;

    try{
        $stmt = $conn->prepare("Select * FROM posts");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
    }
}
?>
