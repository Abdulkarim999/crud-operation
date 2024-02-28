<?php
// Include the database connection file
include 'db_connection.php';

// Process login form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user from the database
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $login = $stmt->fetch();

    // Verify password
    if ($login && password_verify($password, $login['password'])) {
        // Login successful
        echo "Login successful!";
    } else {
        // Login failed
        echo "Invalid username or password.";
    }
}
?>
