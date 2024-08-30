<?php
include "config.php";

$sql = "SELECT *FROM Posts ";
$result = $conn->query($sql);
if($result && $result->num_rows>0)
{
    echo'
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ALL POSTS</title>
         <link rel="stylesheet" href="style/style.css"> <!-- Include your CSS file here -->
    </head>
    <body> 
      <header>
            <h1>All Posts</h1>
        </header>
        <div class="card-container">';

  
          // Loop through each post and display it
        while($post = $result->fetch_assoc()){ 
             $reg_date = $post['reg_date'];
    $date = new DateTime($reg_date);
    $formatted_date = $date->format('d-m-Y h:i A');
        $title = htmlspecialchars($post['title']);
        $reg_date = htmlspecialchars($formatted_date);
        $paragraph = htmlspecialchars($post['paragraph']);
        $upload_file = htmlspecialchars($post['upload_file']);


    echo '<div class="card">
        <img src="' . $upload_file . '" alt="Image" class="card-img">
        <div class="card-content">
            <h2 class="card-title">' . $title . '</h2>
             <p class="card-date">' . $reg_date . '</p>
            <p class="card-paragraph">' . $paragraph . '</p>
         
        </div></div>';}
         echo '</div>
    </body>
    </html>';

}