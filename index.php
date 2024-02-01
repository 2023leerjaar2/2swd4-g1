<?php
session_start();
require_once('dbconnect.php');

$sql = "SELECT * FROM posts ORDER BY date_published LIMIT 4";
$stmt = $conn->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <main id="homepage-main">
        <article id="newest-recipe">
            <h1 class="homepage-title">Nieuwste recept</h1>

            <article id="newest-recipe-container">
                <a class="newest-recipe-title" href="recept.php?id=<?= $posts[0]['id']?>"'><?php echo $posts[0]['title']?></a>
                <img src="./images/default.png" class="newest-recipe-img">
                <p class="newest-recipe-description"><?php echo $posts[0]['description']?></p>
            </article>
        </article>
        <article id="newest-recipes">
            <p class="homepage-title">Meer nieuwe recepten:</p>
            <article id="newest-recipes-container">
                <article class="new-recipe">
                    <article class=new-recipe-info-container>
                        <a class="new-recipe-title"  href='recept.php?id=<?= $posts[1]['id']?>'><?php echo $posts[1]['title'] ?></a>
                        <p class="new-recipe-description"><?= $posts[1]['description'] ?></p>
                    </article>
                    <img src="./images/default.png" class="new-recipe-img">
                </article>
                <article class="new-recipe">
                <article class=new-recipe-info-container>
                        <a class="new-recipe-title"  href='recept.php?id=<?= $posts[2]['id']?>'><?php echo $posts[2]['title'] ?></a>
                        <p class="new-recipe-description"><?= $posts[2]['description'] ?></p>
                    </article>
                    <img src="./images/default.png" class="new-recipe-img">
                </article>
                <article class="new-recipe">
                <article class=new-recipe-info-container>
                        <a class="new-recipe-title"  href='recept.php?id=<?= $posts[3]['id']?>'><?php echo $posts[3]['title'] ?></a>
                        <p class="new-recipe-description"><?= $posts[3]['description'] ?></p>
                    </article>
                    <img src="./images/default.png" class="new-recipe-img">
                </article>
            </article>
        </article>
    </main>
</body>
</html>