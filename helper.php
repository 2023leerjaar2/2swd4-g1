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


function createVlucht($vliegtuigcode, $tijd, $startbestemming, $eindbestemming) {
    global $conn;

    try {
        $stmt = $conn->prepare("INSERT INTO vluchten (vliegtuigcode, tijd, startbestemming, eindbestemming) VALUES (:vliegtuigcode, :tijd, :startbestemming, :eindbestemming)");

        $stmt->bindParam(':vliegtuigcode',      $vliegtuigcode);
        $stmt->bindParam(':tijd',               $tijd);
        $stmt->bindParam(':startbestemming',    $startbestemming);
        $stmt->bindParam(':eindbestemming',     $eindbestemming);
        
        $stmt->execute();
        return true;

    }
    catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
    }  
}

function readAllVluchten() {
    global $conn;

    try{
        $stmt = $conn->prepare("Select * FROM vluchten");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
    }
}

function readSingleVlucht($vluchtid) {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT * FROM vluchten WHERE id = :id");
        $stmt->bindParam(':id', $vluchtid);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
