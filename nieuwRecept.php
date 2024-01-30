<?php 
session_start();
require_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
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

    $sql = "INSERT INTO posts (title, description, content, date_created, date_published, vegan, difficulty, time_to_cook) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$newTitle, $newDescription, $newContent, $currentDate, $newDatePublished, $newVegan, $newDifficulty, $newTimeToCook])) {

    } else {
        echo "Product niet toegevoegd.";
    }
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
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main>
    <form title="test" method="post" action="" class="registration-form">
        <fieldset id="register-border">
        <legend>Nieuw Recept</legend>
                <fieldset>
                    <label for="title">Titel:</label>
                    <input type="text" id="title" name="title" required>
                </fieldset>
                <fieldset>
                    <label for="description">Beschrijving:</label>
                    <input type="text" id="description" name="description">
                </fieldset>
                <fieldset>
                    <label for="date_published">Datum van publiceren:</label>
                    <input type="datetime-local" id="date_published" name="date_published">
                </fieldset>
                <fieldset>
                    <label for="vegan">Vegetarisch:</label>
                    <input type="checkbox" id="vegan" name="vegan">
                </fieldset>
                <fieldset>
                    <label for="difficulty">Moeilijkheidsgraad</label>
                    <input type="range" id="difficulty" min="0" max="5" name="difficulty" required>
                </fieldset>
                <fieldset>
                    <label for="time_to_cook">Tijd om te koken (minuten):</label>
                    <input type="number" id="time_to_cook" name="time_to_cook" required>
                </fieldset>
                <fieldset class="ck-content" id="content-container">
                    <label for="content">Content:</label>
                    <textarea type="text" id="content" name="content" required></textarea>
                </fieldset>
                <input type="hidden" id="quillcontent" name="quillcontent">
                <input id="new-recipe-button" type="submit" value="Creëer Post" name="create">
        </fieldset>
            </form>
            <input id="quillcontent">
    </main>
</body>
<script>
const data = editor.getData();
document.getElementById("new-recipe-button").addEventListener("click", function() {
    document.getElementById("quillcontent").innerHTML = data;
})
console.log(data);

</script>
</html>