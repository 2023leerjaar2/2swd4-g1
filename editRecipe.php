<?php 
session_start();
require_once('dbconnect.php');
include 'auth.php';

$sql = 'SELECT * FROM posts WHERE id = '.$_GET['recipe'].'';
$stmt = $conn->prepare($sql);
$stmt->execute();
$posts = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $newTitle = $_POST['title'];
    $newDescription = $_POST['description'];
    $newContent = $_POST['content'];
    $currentDate = date("Y-m-d-h-i-s");
    $newDatePublished = $_POST['date_published'];
    $newDifficulty = $_POST['difficulty'];
    $newTimeToCook = $_POST['time_to_cook'];

    if(isset($_POST['vegan'])) {
        $newVegan = 1;
    } else {
        $newVegan = 0;
    }

    $sql = "UPDATE posts SET title = ?, description = ?, content = ?, date_updated = ?, date_published = ?, vegan = ?, difficulty = ?, time_to_cook = ? WHERE id = ".$_GET['recipe'];
    $stmt = $conn->prepare($sql);
    $stmt->execute([$newTitle, $newDescription, $newContent, $currentDate, $newDatePublished, $newVegan, $newDifficulty, $newTimeToCook]);
    header('Location: adminRecept.php');
}
echo date('d/m/Y/h/i');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
    <script src="./js/ckeditor.js"></script>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main>
    <form method="post" action="" class="registration-form">
        <fieldset id="register-border">
        <legend>Nieuw Recept</legend>
                <fieldset>
                    <label for="title">Titel:</label>
                    <input type="text" id="title" name="title" required value="<?= $posts['title'] ?>">
                </fieldset>
                <fieldset>
                    <label for="description">Beschrijving:</label>
                    <input type="text" id="description" name="description" value="<?= $posts['description'] ?>">
                </fieldset>
                <fieldset>
                    <label for="date_published">Datum van publiceren:</label>
                    <input type="datetime-local" id="date_published" name="date_published" value="<?= $posts['date_published'] ?>">
                </fieldset>
                <fieldset>
                    <label for="vegan">Vegetarisch:</label>
                    <input type="checkbox" id="vegan" name="vegan" <?php
                    if ($posts['vegan'] == true) {
                        echo "checked";
                    }
                    ?>>
                </fieldset>
                <fieldset>
                    <label for="difficulty">Moeilijkheidsgraad</label>
                    <input class="rangeinput" type="range" min="1" max="5" id="diffuculty" name="difficulty">
                </fieldset>
                <fieldset>
                    <label for="time_to_cook">Tijd om te koken:</label>
                    <input type="number" id="time_to_cook" name="time_to_cook" required value="<?=$posts['time_to_cook']?>">
                </fieldset>
                <fieldset class="ck-content" id="content-container">
                    <label for="content">Content:</label>
                    <textarea type="text" id="content" name="content" required><?= $posts['content'] ?></textarea>
                </fieldset>
                <input id="new-recipe-button" type="submit" value="Bewerk Post" name="edit">
        </fieldset>
            </form>
    </main>
</body>
</html>