<?php
include 'db.php';

// Check if 'users' table exists and create it if it doesn't
$checkTableQuery = "SHOW TABLES LIKE 'users'";
$result = $conn->query($checkTableQuery);

if ($result->num_rows == 0) {
    // Create 'users' table if it doesn't exist
    $createTableQuery = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";
    
    if ($conn->query($createTableQuery) === TRUE) {
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare SQL query to insert user data
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            header("Location: login.html");
            exit(); // Make sure to stop further execution after redirect

        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Passwords do not match.";
    }
}

$conn->close();
?>
