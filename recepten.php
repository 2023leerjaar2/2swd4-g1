
<?php
session_start();
require_once('dbconnect.php');

$sql = "SELECT * FROM posts";
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
    <main>
    <?php foreach ($posts as $post) {
        if (date('Y-m-d-h-i-s') >= $post['date_published']):
        echo '<section value="'.$post['id'].'" onclick="window.location = event.target.value" class="recipe-card">
            <section class="title-container">
                <a href="./recept.php?id=';echo $post['id']; echo '"" class="recipe-card-title">'.$post['title'].'</a>
                ';
                if ($post['vegan'] == true) {
                    echo '<img class="vegan-icon" src="./images/vegan.png"</img>';
                };
                echo '
            </section>
            <img class="recipe-card-img" src="./images/default.png">
            <p class="recipe-card-description">'.$post['description'].'</p>
        </section>
        ';
            endif;
    }?>
    </main>
</body>
<script>
    function redirect(element) {

        window.location = 'recept.php?id=' + (element.value);
    }
</script>
</html>