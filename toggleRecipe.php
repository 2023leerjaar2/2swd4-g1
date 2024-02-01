<?php
session_start();
require_once("dbconnect.php");
include 'auth.php';
$sql = "SELECT deleted FROM posts WHERE id = ".$_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->execute();
$post = $stmt->fetch();

if($post['deleted'] == FALSE) {
    $sql = "UPDATE posts SET deleted = TRUE WHERE id = ".$_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->execute();
header('Location: adminRecept.php');
} else {
    $sql = "UPDATE posts SET deleted = FALSE WHERE id = ".$_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->execute();
header('Location: adminRecept.php');
}
?>