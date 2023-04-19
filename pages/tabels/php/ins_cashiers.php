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
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$cashID = $_POST['cash_id'];

// Check if  does not exists in the  table
$checkSql = "SELECT CashID FROM Cash WHERE CashID  = '$cashID'";
if (mysqli_num_rows($checkResult) > 0) {
    // CashID already exists, display error message
    $sql = "INSERT INTO Cashier (Surname, Name, Patronymic, CashID) VALUES ('$surname', '$name', '$patronymic', '$cashID')";
} else {
    // Prepare the insert statement
    echo "Error inserting record: this CashID already exists in the cashier table";
}

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
