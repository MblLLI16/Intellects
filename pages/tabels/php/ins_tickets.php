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
$couponID = $_POST['couponID'];
$dateOfSale = $_POST['date_of_sale'];

// Check if couponID does not exists in the Coupon table
$checkSql = "SELECT CouponID FROM Coupon WHERE CouponID = '$couponID'";
$checkResult = mysqli_query($conn, $checkSql);
if (mysqli_num_rows($checkResult) > 0) {
    // CouponID already exists, display error message
    $sql = "INSERT INTO Ticket (CouponID , Date_of_sale) VALUES ('$couponID', '$dateOfSale')";
} else {
    // Prepare the insert statement
    echo "Error inserting record: this CuponID does not exist in the coupon table";
}

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
