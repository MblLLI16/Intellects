<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the Airline ID from the request
$ID = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];

// Prepare the update statement
$sql = "UPDATE Airline SET Name = '$name', Address = '$address' WHERE ID = '$ID' ";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
