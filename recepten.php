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
        <article id="filter-container">
        <form method="post" class="registration-form">
            <fieldset id="register-border">
                <legend>Filters</legend>
                    <fieldset>
                        <label for="vegan">Vegetarisch:</label>
                        <input type="radio" id="vegan" name="vegan">
                    </fieldset>
                    <fieldset>
                        <label for="difficulty">Difficulty:</label>
                        <input class="rangeinput" type="range" value="0" min="0" max="5" id="diffuculty" name="difficulty">
                    </fieldset>
                    <fieldset>
                        <label for="time_to_cook">Tijdsduur:</label>
                        <select id="select-input" type="text" id="time_to_cook" name="time_to_cook">
                            <option value="0">Geen voorkeur</option>
                            <option value="0"><= 15m</option>
                            <option value="1">> 15 & <= 60m</option>
                            <option value="3">> 61m </option>
                        </select>
                    </fieldset>
                    <button type='submit' id='new-recipe-button' name='filter-button'>Filter</button>
                </fieldset>
            </form>
        </article>
        <?php foreach ($posts as $post) {
        if (date('Y-m-d-h-i-s') >= $post['date_published']):
        echo '<section value="'.$post['id'].'" class="recipe-card">
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
<?php
if(isset($_POST['filter-button'])) {
        header('Location: filteredRecipes.php?vegan='.$_POST['vegan'].'&difficulty='.$_POST['difficulty'].'&ttk='.$_POST['time_to_cook']);
}
?>
</html>