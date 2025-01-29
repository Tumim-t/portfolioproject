<?php
require_once '../includes/Database.php';
require_once '../includes/Section.php';


$db = new Database();
$conn = $db->getConnection();


$section = new Section($conn);


$contactStmt = $section->getSectionByName('Contact');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - My Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Contact Me</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="testimonials.php">Testimonials</a></li>
            <li><a href="blogs.php">Blog</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </ul>
    </nav>
</header>

<main>
    <section id="contact">
        <h2>Contact</h2>
        <p><?= $contactStmt['content']; ?></p>
    </section>
</main>



</body>
</html>
