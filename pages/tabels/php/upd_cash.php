<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the Cash ID from the request
$cashID = $_POST['cashID'];
$address = $_POST['address'];
$cashNumber = $_POST['cash_number'];

// Prepare the update statement
$sql = "UPDATE Cash SET Address = '$address', Cash_number = '$cashNumber' WHERE CashID = '$cashID' ";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
