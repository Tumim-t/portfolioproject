<?php
include_once('../includes/Database.php');
$db = Database::getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && isset($_POST['title'])) {
    $title = $_POST['title'];
    $image = $_FILES['image'];

    
    echo "Title: " . htmlspecialchars($title) . "<br>";
    echo "Image File: " . htmlspecialchars($image['name']) . "<br>";

    
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image['type'], $allowedTypes)) {
        die('Only image files are allowed.');
    }

    
    $targetDir = "../public/uploads/";
    $targetFile = $targetDir . basename($image["name"]);
    
    
    $imagePath = 'public/uploads/' . basename($image["name"]);

    
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        echo "File uploaded and moved to: " . $targetFile . "<br>";
        
        
        $query = "INSERT INTO portfolio_images (title, image_path) VALUES (:title, :image_path)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':image_path', $imagePath);

        
        echo "Inserting into portfolio_images (title: " . htmlspecialchars($title) . ", image_path: " . htmlspecialchars($imagePath) . ")<br>";

        if ($stmt->execute()) {
            echo "Image uploaded and data inserted into the database successfully!";
        } else {
            echo "Failed to upload image. Error: " . implode(", ", $stmt->errorInfo());
        }
    } else {
        echo "Error uploading file. Please check the upload directory permissions.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <style>
        .form-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            width: 300px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        .form-container button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Upload Image</h2>
<div class="form-container">
    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
        <label for="title">Image Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image" required><br>

        <button type="submit">Upload</button>
    </form>
</div>

</body>
</html>
