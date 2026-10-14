
<?php
$team = "YOUR_TEAM";
$pages = [
    "Home" => "index.php",
    "About Us" => "about.php",
    "Contact" => "contact.php",
    "Products" => "products.php"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f9;
            color: #333;
        }
        header {
            background: #243b55;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background: #141e30;
            padding: 15px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }
        nav a:hover {
            color: #ffd166;
        }
        main {
            max-width: 800px;
            margin: 30px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>About Our Website</h1>
    <p>Welcome to our website</p>
</header>

<nav>
    <?php foreach ($pages as $name => $url): ?>
        <a href="<?= htmlspecialchars($url) ?>">
            <?= htmlspecialchars($name) ?>
        </a>
    <?php endforeach; ?>
</nav>

<main>
    <h2>Website Goals</h2>
    <ol>
        <li>Provide useful and accurate information to visitors.</li>
        <li>Make the website easy to navigate and use.</li>
        <li>Help users find the information or products they need.</li>
    </ol>

    <h2>About Us</h2>
    <p>This website was created as part of a PHP web development project.</p>
</main>

</body>
</html>
