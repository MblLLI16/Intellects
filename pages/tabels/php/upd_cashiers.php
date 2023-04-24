<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the Cashier data from the request
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$cashID = $_POST['cashID'];
$cashierID = $_POST['cashierID'];

// Check if CashID already exists in the Cash table
$checkSql = "SELECT CashID FROM Cash WHERE CashID = '$cashID'";
$checkResult = mysqli_query($conn, $checkSql);

$sql = ""; 
if (mysqli_num_rows($checkResult) > 0) {
    // CashID already exists, display error message and exit script
    $sql = "UPDATE Cashier SET Surname = '$surname', Name = '$name', Patronymic = '$patronymic', CashID = '$cashID' WHERE CashierID = $cashierID";
   
} else {
    // Prepare the update statement
    echo "Error updating record: this CashID don't exists in the Cash table";
}

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
