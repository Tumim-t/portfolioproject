<?php
require_once '../includes/Database.php';

// Initialize Database connection
$db = new Database();
$conn = $db->getConnection();

// Fetch the images from the database
$query = "SELECT * FROM portfolio_images";
$stmt = $conn->query($query);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Welcome to My Portfolio</h1>
    <nav>
        <ul>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="portfolio.php">Portfolio</li>
            <li><a href="testimonials.php">Testimonials</a></li>
            <li><a href="blogs.php">Blog</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </ul>
    </nav>
</header>

<main>
    <h2>My Portfolio</h2>
    <div class="portfolio-gallery">
        <?php foreach ($images as $image): ?>
            <div class="portfolio-item">
                <img src="<?php echo 'uploads/' . htmlspecialchars($image['image_path']); ?>" alt="<?php echo htmlspecialchars($image['title']); ?>">
                <p><?php echo htmlspecialchars($image['title']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</main>


</body>
</html>
