<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
   <header>
    <p>Blog | New Post</p>
   </header> 
   <br>
   <div class="container">
    <form method="POST" action="PostsSavingProcess.php" enctype="multipart/form-data">
        <input type="text" placeholder="Blog Title..." name="title" class="title"  required>
        <br>
        <?php
         date_default_timezone_set('Africa/Cairo');
            $dateTime = new DateTime();
            echo 'Date: ' . $dateTime->format('d/m/Y, h:i A');
        ?>
        <br><br>
        <input type="file" name="image" accept="image/*" required><br>
        <br><br>
        <textarea placeholder="Blog Paragraph..." cols="50" rows="10" name="paragraph"  required></textarea>
        <br><br>
        <input type="submit" name="submit" value="Save Post">
        <br><br>
        <button > <a href="home.php">Go To Home Page</a> </button>
    </form>
   </div>
</body>
</html>
