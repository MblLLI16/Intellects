<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user input from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Sanitize the input to prevent SQL injection attacks
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Query the database to check if the user exists
$sql = "SELECT * FROM LoginTable WHERE Login='$email' AND Password='$password'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Check if the user exists
if (mysqli_num_rows($result) == 1) {
    // User exists, redirect to main_page.php
    header("Location: /intellects/pages/main_page.php");
} else {
    // User does not exist or password is incorrect, display an error message
    echo "Invalid email or password.";
}

// Close the database connection
mysqli_close($conn);
?>
