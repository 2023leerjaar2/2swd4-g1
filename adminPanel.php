
<?php
session_start();
include 'auth.php';
require_once('dbconnect.php');

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    include 'dbconnect.php';
    include 'auth.php';
    include 'header.php';

    ?>
    <main>
        <section id="table-container">
                <a id="new-recipe-button" href="./nieuweGebruiker.php">Nieuwe gebruiker</a>
            <table class="darkTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gebruikersnaam</th>
                        <th>Wachtwoord</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>******</td>
                        <td id="button-cell"><a href="./editUser.php?id=<?php echo $user['id']?>" class="button-edit">Bewerk</a><a href="./deleteUser.php?id=<?php echo $user['id']?>" id="button-delete" class="button-delete">Verwijder</a></td>
                    </tr>
                    <?php endforeach;?>
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