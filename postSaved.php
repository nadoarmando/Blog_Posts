<?php
// Include configuration and processing files
include 'config.php';

// Prepare SQL query to fetch the latest post
$sql = "SELECT title, upload_file, paragraph, reg_date FROM Posts ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Check if query was successful and if there are results
if ($result && $result->num_rows > 0) {
    // Fetch the latest post data
    $post = $result->fetch_assoc();

    // Format the registration date
    $reg_date = $post['reg_date'];
    $date = new DateTime($reg_date);
    $formatted_date = $date->format('d-m-Y, h:i A');

    // Output the HTML with the post details
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css"> <!-- Include your CSS file here -->
        <title>Post Saved</title>
    </head>
    <body>
        <header>
            <h1>Post Saved</h1>
            <a href="home.php">Go To Home Page</a>
        </header>
    
        <div class="post-container">
            <h2  style="margin:0">' . htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') . '</h2>
            <p h2 > ' . htmlspecialchars($formatted_date, ENT_QUOTES, 'UTF-8') . '</p>
            <p>' . nl2br(htmlspecialchars($post['paragraph'], ENT_QUOTES, 'UTF-8')) . '</p>
        </div>
    </body>
    </html>';
} else {
    echo 'No post found.';
}

// Close the database connection
$conn->close();

