<?php
require_once '../includes/Database.php';
require_once '../includes/Section.php';


$db = new Database();
$conn = $db->getConnection();


$section = new Section($conn);


$aboutStmt = $section->getSectionByName('About');
$contactStmt = $section->getSectionByName('Contact');
$servicesStmt = $section->getSectionByName('Services');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="style.css"> <!-- Linking the CSS file -->
</head>
<body>

<header>
    <h1>Welcome to My Portfolio</h1>
    <nav>
        <ul>
          
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="portfolio.php">Portfolio</a></li> 
            <li><a href="testimonials.php">Testimonials</a></li>
            <li><a href="blogs.php">Blog</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </ul>
    </nav>
</header>

<main>
   
    <h2>Welcome to my portfolio. Choose a section from the menu.</h2>
</main>



</body>
</html>
