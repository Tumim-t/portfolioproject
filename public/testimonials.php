<?php
require_once '../includes/Database.php';
require_once '../includes/Section.php';


$db = new Database();
$conn = $db->getConnection();


$section = new Section($conn);

$testimonialsStmt = $section->getSectionByName('Testimonials');
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
    <h1>TESTIMONIES</h1>
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
    <section id="testimonials">
        <h2>Client Testimonials</h2>
        <?php if ($testimonialsStmt): ?>
            <?php 
                // Split content by line breaks, assuming each testimonial is separated by a newline
                $testimonials = explode("\n", $testimonialsStmt['content']);
            ?>
            
            <div class="testimonials-container">
                <?php foreach ($testimonials as $testimonial): ?>
                    <?php 
                        // Clean up the data by removing unwanted characters
                        $testimonial = trim($testimonial); // Remove leading/trailing spaces
                        // Remove any unnecessary characters such as parentheses, brackets, quotes, etc.
                        $testimonial = str_replace(array('(', ')', '[', ']', '“', '”', '"', "'"), '', $testimonial);
                    ?>

                    <div class="testimonial-item">
                        <p><?php echo nl2br(htmlspecialchars(trim($testimonial))); ?></p>
                    </div>

                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <p>No testimonials available.</p>
        <?php endif; ?>
    </section>
</main>



</body>
</html>