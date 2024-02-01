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
<?php
session_start();
include 'dbconnect.php';

$query_str = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($query_str, $query_params);
$query_str = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($query_str, $query_params);
print_r($query_params);
$sql = "SELECT DISTINCT * FROM posts WHERE 1=1";
$params = array();

if (isset($_GET['vegan']) && $_GET['vegan'] == "on") {
    echo 'executing vegan on';
    $sql .= " AND vegan = :vegan";
    $params[':vegan'] = 1;
}

if ($query_params['difficulty'] > 0) {
    $sql .= " AND difficulty = :difficulty";
    $params[':difficulty'] = $query_params['difficulty'];
}

if ($query_params['ttk'] == 1) {
    echo 'executing ttk1';
    $sql .= " AND time_to_cook <= :time_to_cook";
    $params[':time_to_cook'] = 15;
} else if ($query_params['ttk'] == 2) {
    echo 'executing ttk2';
    $sql .= " AND time_to_cook > :time_to_cook_lower AND time_to_cook <= :time_to_cook_upper";
    $params[':time_to_cook_lower'] = 15;
    $params[':time_to_cook_upper'] = 60;
} else if ($query_params['ttk'] == 3) {
    echo 'executing ttk3';
    $sql .= " AND time_to_cook > :time_to_cook";
    $params[':time_to_cook'] = 60;
}

// Prepare and execute the SQL query
$stmt = $conn->prepare($sql);
$stmt->execute($params);
        // Display the results
        while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
        }
            ?>