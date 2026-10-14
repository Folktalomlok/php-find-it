
<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            text-align: center;
            padding: 100px 20px;
            color: #333;
        }
        h1 {
            font-size: 80px;
            color: #e74c3c;
            margin-bottom: 10px;
        }
        a {
            display: inline-block;
            background: #243b55;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
        }
        a:hover {
            background: #141e30;
        }
    </style>
</head>
<body>

    <h1>404</h1>
    <h2>Page Not Found</h2>
    <p>Sorry, the page you are looking for does not exist.</p>
    <a href="index.php">Back to Home</a>

</body>
</html>
