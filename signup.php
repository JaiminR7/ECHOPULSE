<?php
// Database connection
$servername = "localhost";
$username = "root";  // default username for XAMPP
$password = "";      // no password for XAMPP by default
$dbname = "ecommerce_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into the database
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: signin.html");  // Redirect to Sign In page after successful signup
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
