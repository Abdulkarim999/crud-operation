<?php
// Include the database connection file
include 'db_connection.php';

// Process registration form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the query
    $stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
    } else {
        // Registration failed
        echo "Error registering user.";
    }
}
?>
