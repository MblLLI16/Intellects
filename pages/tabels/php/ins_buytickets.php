<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the BuyTicket data from the request
$pass_number = $_POST['passNumber'];
$companyID = $_POST['companyID'];
$cashierID = $_POST['cashierID'];
$ticketID = $_POST['ticketID'];

// Check if the passport number exists in the Client table
$checkSql1 = "SELECT passport_number FROM Client WHERE passport_number = '$pass_number'";
$checkResult1 = mysqli_query($conn, $checkSql1);

// Check if the companyID exists in the Airline table
$checkSql2 = "SELECT ID FROM Airline WHERE ID = '$companyID'";
$checkResult2 = mysqli_query($conn, $checkSql2);

// Check if the cashierID exists in the Cashier table
$checkSql3 = "SELECT CashierID FROM Cashier WHERE CashierID = '$cashierID'";
$checkResult3 = mysqli_query($conn, $checkSql3);

// Check if the ticketID exists in the Ticket table
$checkSql4 = "SELECT Ticket_code FROM Ticket WHERE Ticket_code = '$ticketID'";
$checkResult4 = mysqli_query($conn, $checkSql4);

$sql = ""; 
if (mysqli_num_rows($checkResult1) > 0 && mysqli_num_rows($checkResult2) > 0 && mysqli_num_rows($checkResult3) > 0 && mysqli_num_rows($checkResult4) > 0) {
    // Passport number, companyID, cashierID, and ticketID all exist, insert a new record into the BuyTicket table
    $sql = "INSERT INTO BuyTicket (Pass_number, CompanyID, CashierID, TicketID) VALUES ('$pass_number', '$companyID', '$cashierID', '$ticketID')";
} else {
    // Display error message and exit script
    echo "Error inserting record: One or more of the required values do not exist in their respective table";
}


// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
