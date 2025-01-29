<?php

include_once('../includes/Database.php');
include_once('../includes/Section.php');


$db = Database::getConnection();


if (!$db) {
    die("Database connection failed.");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    $name = $_POST['name'];
    $content = $_POST['content'];

   
    $section = new Section($db);

    
    if ($section->addSection($name, $content)) {
        echo "Section added successfully!";
    } else {
        echo "Failed to add section.";
    }
}
?>


<form method="POST" action="">
    
    <label for="name">name:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="content">Content:</label>
    <textarea name="content" id="content" required></textarea><br>

    <button type="submit">Add Section</button>
</form>

