<?php
// Database connection
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "signup"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL to insert data into database
    $sql = "INSERT INTO users (username, email, password)
    VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Return success response
        http_response_code(200);
        echo "Data stored successfully";
    } else {
        // Return error response
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
