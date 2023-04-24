<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";



$conn = mysqli_connect($servername, $username, $password, $dbname);

$companyID = $_POST['airlineId'];
$dateofsale = $_POST['date_of_sale'];

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Check if the passport number exists in the Client table
$checkSql = "SELECT ID FROM Airline WHERE ID = '$companyID'";
$checkResult = mysqli_query($conn, $checkSql);

$sql = "";
if (mysqli_num_rows($checkResult) > 0) {
    $sql = "SELECT Ticket.Ticket_code, Coupon.Ticket_price, Client.first_name, Client.last_name, Client.patronymic, Airline.Name AS Airline_Name
FROM BuyTicket
INNER JOIN Airline ON Airline.ID = BuyTicket.CompanyID
INNER JOIN Cashier ON Cashier.CashierID = BuyTicket.CashierID
INNER JOIN Ticket ON Ticket.Ticket_code = BuyTicket.TicketID
INNER JOIN Coupon ON Coupon.CouponID = Ticket.CouponID
INNER JOIN Client ON Client.passport_number = BuyTicket.Pass_number
WHERE Airline.ID = '$companyID' AND MONTH(Ticket.Date_of_sale) = '$dateofsale';
";
} else {
    // Display error message and exit script
    echo "Error show record: One or more of the required values do not exist in their respective table";
}

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
mysqli_close($conn);




?>