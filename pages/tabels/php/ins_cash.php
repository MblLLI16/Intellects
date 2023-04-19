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
$address = $_POST['address'];
$cashNumber = $_POST['cash_number'];

// Prepare the insert statement
$sql = "INSERT INTO Cash (Address, Cash_number) VALUES ('$address', '$cashNumber')";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
