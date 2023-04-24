<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$date = $_POST['date_of_sale'];

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT CONCAT('Авиакомпания: ', a.Name) AS Airline, c.last_name, c.first_name, c.patronymic 
        FROM BuyTicket bt
        JOIN Airline a ON a.ID = bt.CompanyID
        JOIN Ticket t ON t.Ticket_code = bt.TicketID
        JOIN Coupon cp ON cp.CouponID = t.CouponID
        JOIN Client c ON c.passport_number = bt.Pass_number
        WHERE MONTH(t.Date_of_sale) = '$date'
        ORDER BY a.Name, c.last_name, c.first_name, c.patronymic;
    ";

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
