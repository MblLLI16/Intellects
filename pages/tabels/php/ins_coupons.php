<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$type = $_POST['type'];
$ticket_price = $_POST['ticket_price'];
$direction = $_POST['direction'];

// Prepare the insert statement
$sql = "INSERT INTO Coupon (Type, Ticket_price, Direction) VALUES ('$type', '$ticket_price', '$direction')";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
