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

// Get the table input from the form
$table_name = 'Cashier';

// Sanitize the input to prevent SQL injection attacks
$table_name = mysqli_real_escape_string($conn, $table_name);

// Query the database to retrieve data from the Coupon table
$sql = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$data = array();
while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
mysqli_close($conn);





?>