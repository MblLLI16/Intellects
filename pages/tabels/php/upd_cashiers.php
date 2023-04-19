<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the Cashier ID from the request
$cashierID = $_POST['cashierID'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$cashID = $_POST['cashID'];

// Prepare the update statement
$sql = "UPDATE Cashier SET Surname = '$surname', Name = '$name', Patronymic = '$patronymic', CashID = '$cashID' WHERE CashierID = $cashierID";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
