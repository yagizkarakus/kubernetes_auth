<?php
$servername = getenv('servername');
$username = getenv("username");  // Your MySQL username
$password = getenv("password");      // Your MySQL password
$dbname = getenv("dbname");  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
