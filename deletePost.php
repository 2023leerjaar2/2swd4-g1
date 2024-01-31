<?php
require_once("dbconnect.php");

$sql = "DELETE FROM posts WHERE id = ".$_GET['id']."";
$stmt = $conn->prepare($sql);
$stmt->execute();
header('Location: adminRecept.php')
?>