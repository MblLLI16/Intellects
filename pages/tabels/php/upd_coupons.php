<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the Coupon ID from the request
$couponID = $_POST['couponID'];
$type = $_POST['type'];
$ticketPrice = $_POST['ticket_price'];

// Prepare the update statement
$sql = "UPDATE Coupon SET Type = '$type', Ticket_price = '$ticketPrice' WHERE CouponID = $couponID";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
