<?php
// Assuming your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch username and password from form submission
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the username and password match in the database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Check if there is a matching record
if ($result->num_rows > 0) {
  // Login successful
  // Redirect to index.html
  header("Location: ./index.html");
  exit; // Ensure that script execution stops after redirection
} else {
  // Login failed
  echo "Invalid username or password!";
}

// Close connection
$conn->close();
?>

