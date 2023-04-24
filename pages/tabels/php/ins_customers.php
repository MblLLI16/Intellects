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
$passport_number = $_POST['passport_number'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$patronymic = $_POST['patronymic'];

$checkSql1 = "SELECT passport_number FROM Client WHERE passport_number = '$passport_number'";
$checkResult1 = mysqli_query($conn, $checkSql1);

$sql = ""; 
if (mysqli_num_rows($checkResult1) > 0) {
    // Passport number, companyID, cashierID, and ticketID all exist, insert a new record into the BuyTicket table
    echo "Error inserting record: One or more of the required values alredy exist in their respective table";
} else {
    // Prepare the insert statement
    $sql = "INSERT INTO Client (passport_number, last_name, first_name, patronymic) VALUES ('$passport_number', '$last_name', '$first_name', '$patronymic')";
}


// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
