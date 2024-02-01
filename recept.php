
<?php
session_start();
require_once('dbconnect.php');

$sql = "SELECT * FROM posts WHERE id = ".$_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php'?>
    <main id="recipe-main">
        <article id="full-recipe">
            <article id="full-recipe-info-container">
                <h1 class="post-title"><?=$post['title'] ?></h1>
                <p class="full-recipe-description"><?=$post['description'] ?></p>
                <p class="full-recipe-content"><?=nl2br($post['content']) ?></p>
            </article>
            <img id="full-post-img" src="./images/default.png">
        </article>
    </main>