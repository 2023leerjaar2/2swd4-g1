
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
    <?php
    include 'header.php';
    ?>
    <main>
        <section id="table-container">
                <a id="new-recipe-button" href="./nieuwRecept.php">Nieuw recept</a>
            <table class="darkTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titel</th>
                        <th>Creatie datum</th>
                        <th>Actief</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $src;
                    $active;

                    foreach ($posts as $post):
                        if ($post['date_published'] < date("Y-m-d-h-i-s")) {
                            $active = "Ja";
                        }   else {
                            $active = "Nee";
                        }
                    
                    ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td><?= $post['title'] ?></td>
                        <td><?= $post['date_created'] ?></td>
                        <td><?= $active ?></td>
                        <td id="button-cell"><a href="./editRecipe.php?recipe=<?php echo $post['id']?>" class="button-edit">Bewerk</a><a href="./deletePost.php?id=<?php echo $post['id']?>" id="button-delete" class="button-delete">Verwijder</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </tr>
            </table>
        </section>
    </main>
</body>
<input type="hidden" id="hiddencontent"></input>
<script>
    function remove(element) {
        document.getElementById("hiddencontent").innerHTML = (element.value);
    }
</script>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button-delete'])) {
    echo $_POST['hiddencontent'];
}
?> 
</html>