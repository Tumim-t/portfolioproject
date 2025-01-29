<?php
require_once '../includes/Database.php';
require_once '../includes/Section.php';


$db = new Database();
$conn = $db->getConnection();


$section = new Section($conn);


$aboutStmt = $section->getSectionByName('About');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - My Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>About Me</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
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
    <section id="about">
        <h2>About Me</h2>
        <div class="about-content">
            <?php
            
            $content = $aboutStmt['content'];

           
            $formattedContent = nl2br($content); 
            $formattedContent = str_replace('### ', '<h3>', $formattedContent);
            $formattedContent = str_replace("\n", '</h3>', $formattedContent);

            
            echo $formattedContent;
            ?>
        </div>
    </section>
</main>


</body>
</html>
