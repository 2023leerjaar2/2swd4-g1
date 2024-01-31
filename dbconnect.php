<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=kamadoing", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->exec('USE kamadoing;');
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>