<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the CashID from the request
$BuyTicketID  = $_POST['buyticketID'];

// Prepare the delete statement
$sql = "DELETE FROM Ticket WHERE BuyTicketID  = $BuyTicketID ";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
