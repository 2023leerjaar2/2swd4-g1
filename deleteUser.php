<?php
session_start();
require_once("dbconnect.php");
include 'auth.php';
$sql = "DELETE FROM users WHERE id = ".$_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->execute();
header('Location: adminPanel.php');
?>