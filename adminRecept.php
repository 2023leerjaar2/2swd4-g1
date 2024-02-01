
<?php
session_start();
include 'auth.php';
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
                        <th>Gepubliceerd</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $src;
                    $active;

                    foreach ($posts as $post):
                        if ($post['date_published'] < date("Y-m-d-h-i-s") == 1) {
                            $published = 1;
                        } else {
                            $published = 0;
                        }

                        if ($published == 1 && $post['deleted'] == 0) {
                            $active = "Ja";
                            $html = 'button-delete">Deactiveer';
                        }   else if ($published == 0 && $post['deleted'] == 1) {
                            $active = "Nee";
                            $html = 'button-activate">Activeer';
                        } else if ($published == 1 && $post['deleted'] == 1) {
                            $active = "Nee";
                            $html = 'button-activate">Activeer';
                        } else if ($published == 0 && $post['deleted'] == 0) {
                            $active = "Nee";
                            $html = 'button-delete">Deactiveer';
                        }
                    
                    ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td><?= $post['title'] ?></td>
                        <td><?= $post['date_created'] ?></td>
                        <td><?= $active ?></td>
                        <td id="button-cell"><a href="./editRecipe.php?recipe=<?php echo $post['id']?>" class="button-edit">Bewerk</a><a href="./toggleRecipe.php?id=<?php echo $post['id']?>" id="button-delete" class="<?php echo $html; ?></button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </tr>
            </table>
        </section>
    </main>
</body>
</html>