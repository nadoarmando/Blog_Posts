<?php
$servername = "db";

$username = "my_user";

$password = "my_password";

$database = "my_database";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error)
    die("Connection failed" . $conn->connect_error);