<?php
require_once '../includes/Database.php';
require_once '../includes/Section.php';


$db = new Database();
$conn = $db->getConnection();

$section = new Section($conn);


$servicesStmt = $section->getSectionByName('Services');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - My Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Services</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="testimonials.php">Testimonials</a></li>
            <li><a href="blogs.php">Blog</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </ul>
    </nav>
</header>
<main>
    <section id="services">
        <h2>Our Graphic Design Services</h2>
        <?php if ($servicesStmt): ?>
            <?php 
                
                $services = explode("\n", $servicesStmt['content']); // Splits by newline
            ?>
            
            <ul class="services-list">
                <?php foreach ($services as $service): ?>
                    <li><?= nl2br(htmlspecialchars($service)); ?></li>
                <?php endforeach; ?>
            </ul>

        <?php else: ?>
            <p>No services available.</p>
        <?php endif; ?>
    </section>
</main>


</body>
</html>
