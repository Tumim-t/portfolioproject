<?php
require_once '../includes/Database.php';
require_once '../includes/Section.php';


$db = new Database();
$conn = $db->getConnection();


$section = new Section($conn);


$faqStmt = $section->getSectionByName('FAQ');
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
    <h1>FAQ</h1>
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
    <section id="faq">
        <?php if ($faqStmt): ?>
            <?php 
              
                $faqItems = explode("\n", $faqStmt['content']); 
            ?>
            <?php foreach ($faqItems as $item): ?>
                <?php
                    
                    $item = trim($item);

                    
                    if (strpos($item, ':') !== false) {
                        
                        list($question, $answer) = explode(":", $item, 2);

                        
                        if (isset($question) && isset($answer)) {
                            echo '<div class="faq-item">';
                            echo '<p><strong>' . htmlspecialchars(trim($question)) . '</strong></p>';
                            echo '<p>' . nl2br(htmlspecialchars(trim($answer))) . '</p>';
                            echo '</div>';
                        }
                    }
                ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No FAQ available.</p>
        <?php endif; ?>
    </section>
</main>

</body>
</html>