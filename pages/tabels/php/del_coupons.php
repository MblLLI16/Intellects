<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the CouponID from the request
$couponID = $_POST['couponID'];

// Prepare the update statement
$sql = "DELETE FROM Coupon WHERE couponID = $couponID";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record del successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
