<?php
include 'dbconfig.php'; // Include the database configuration file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Database-Driven Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .post {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .post h2 {
            margin-top: 0;
        }
        .post time {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Latest Posts</h1>
    <?php
    try {
        // Create a new PDO instance
        $pdo = new PDO($dsn, $user, $pass, $options);
        
        // SQL query
        $sql = 'SELECT * FROM content ORDER BY created_at DESC';
        
        // Execute the query and obtain the results
        $stmt = $pdo->query($sql);

        // Loop through the results and display them
        while ($row = $stmt->fetch()) {
            echo "<div class='post'>";
            echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
            echo "<time>" . $row['created_at'] . "</time>";
            echo "<p>" . nl2br(htmlspecialchars($row['body'])) . "</p>";
            echo "</div>";
        }
    } catch (\PDOException $e) {
        // Handle connection errors
        echo "Error connecting to database: " . $e->getMessage();
    }
    ?>
</body>
</html>

