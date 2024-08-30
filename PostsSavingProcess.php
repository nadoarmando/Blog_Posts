<?php
date_default_timezone_set('Africa/Cairo');
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title'], $_POST['paragraph'], $_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        
        // Sanitize input to avoid SQL injection
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
        $paragraph = htmlspecialchars($_POST['paragraph'], ENT_QUOTES, 'UTF-8');
        
        // Directory where images will be saved
        $target_dir = "uploads/";
        
        // Get image details
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                
                // Prepare and bind SQL statement
                $sql = "INSERT INTO Posts (title, upload_file, paragraph, reg_date) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                // Bind parameters
                $reg_date = date('Y-m-d H:i:s');
                $stmt->bind_param('ssss', $title, $target_file, $paragraph, $reg_date);

                if ($stmt->execute()) {
                    // Redirect to postSaved.php
                    $url = "postSaved.php?title=" . urlencode($title);
                    header("Location: $url");
                    exit();
                } else {
                    echo "Error executing statement: " . $stmt->error;
                }
            } else {
                echo "Error moving the uploaded file.";
            }
        } else {
            echo "File is not a valid image.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}
