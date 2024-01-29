<?php
require "dbconnect.php";

function loginUser($gebruikersnaam, $wachtwoord, $conn) {
    $query = "SELECT * FROM gebruikers WHERE gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
    $stmt->bindParam(':wachtwoord', $wachtwoord);
    $stmt->execute();

    return $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : false;
}

?>
