<?php

include_once('../includes/Database.php');
include_once('../includes/Section.php');


$db = Database::getConnection();


$section = new Section($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];

    if ($section->deleteSection($id)) {
        
        header('Location: dashboard.php?message=Section deleted successfully');
        exit;
    } else {
        echo "Failed to delete section.";
    }
} else {
    echo "Invalid section ID or request.";
}
?>

