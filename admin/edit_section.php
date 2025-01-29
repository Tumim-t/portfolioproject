<?php

include_once('../includes/Database.php');
include_once('../includes/Section.php');

$db = Database::getConnection();
$section = new Section($db);


$sectionData = null;


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; 

    $sectionData = $section->getSectionById($id);
    if (!$sectionData) {
        die('Section not found');
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['content'], $_POST['id'])) {
    $id = $_POST['id']; 
    $name = $_POST['name']; 
    $content = $_POST['content']; 

   
    if ($section->updateSection($id, $name, $content)) {
        
        header("Location: edit_section.php?id=$id&message=Section updated successfully!");
        exit;
    } else {
        echo "Failed to update section.";
    }
}
?>

<h2>Edit Section</h2>

<?php  if ($sectionData): ?>
    <form method="POST" action="">
    
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($sectionData['id']); ?>">

       
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($sectionData['name']); ?>" required><br>

        
        <label for="content">Content:</label>
        <textarea name="content" id="content" required><?php echo htmlspecialchars($sectionData['content']); ?></textarea><br>

        
        <button type="submit">Update</button>
    </form>
<?php else: ?>
    <p>Invalid Section ID</p>
<?php endif; ?>

