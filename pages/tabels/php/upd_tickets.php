<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the Ticket ID from the request
$ticketID = $_POST['ticketCode'];
$couponID = $_POST['couponID'];
$dateOfSale = $_POST['dateOfSale'];

// Check if couponID does not exists in the Coupon table
$checkSql = "SELECT CouponID FROM Coupon WHERE CouponID = '$couponID'";
$checkResult = mysqli_query($conn, $checkSql);
if (mysqli_num_rows($checkResult) > 0) {
    // Prepare the update statement
    $sql = "UPDATE Ticket SET CouponID = '$couponID', Date_of_sale = '$dateOfSale' WHERE TicketID = '$ticketID' ";
} else {
    // CouponID already exists, display error message
    echo "Error inserting record: this CuponID does not exist in the coupon table";
}



// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>