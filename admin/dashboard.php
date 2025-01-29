<?php
include_once('../includes/Database.php');
include_once('../includes/Section.php');


$db = Database::getConnection();


$section = new Section($db);


$sections = $section->readAll()->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            color: white;
        }
        .btn.add {
            background-color: #4CAF50;
        }
        .btn.edit {
            background-color: #2196F3;
        }
        .btn.delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>

   
    <a href="add_section.php" class="btn add">Add New Section</a>
    <a href="upload_image.php" class="btn add">Upload Image</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sections as $section): ?>
                <tr>
                    <td><?php echo htmlspecialchars($section['id']); ?></td>
                    <td><?php echo htmlspecialchars($section['name']); ?></td>
                    <td><?php echo htmlspecialchars($section['content']); ?></td>
                    <td>
                        
                        <a href="edit_section.php?id=<?php echo $section['id']; ?>" class="btn edit">Edit</a>
                        
                        <form method="POST" action="delete_section.php" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $section['id']; ?>">
                            <button type="submit" class="btn delete" onclick="return confirm('Are you sure you want to delete this section?');">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

