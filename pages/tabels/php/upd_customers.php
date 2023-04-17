<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the ClientID from the request
$ClientID = $_POST['ClientID'];
$passport_number = $_POST['passport_number'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$patronymic = $_POST['patronymic'];

// Prepare the upd statement
$sql = "UPDATE Client SET passport_number = '$passport_number', last_name = '$last_name', first_name = '$first_name', patronymic = '$patronymic' WHERE ClientID = $ClientID";

// echo "<table>";
// echo "<tr><th>Client ID</th><th>Passport Number</th><th>Last Name</th><th>First Name</th><th>Patronymic</th><th>Action</th><th>Action</th></tr>";
// while ($row = mysqli_fetch_assoc($result)) {
//     echo "<tr><td>" . $row["ClientID"] . "</td><td>" . $row["passport_number"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["patronymic"] . "</td><td><button onclick='deleteRow(" . $row["ClientID"] . ")'>Delete</button></td> <td><button onclick='updRow(" . $row["ClientID"] . $row["passport_number"] . $row["last_name"] . $row["first_name"] . $row["patronymic"] . ")'>Update</button></td>
//     </tr>";
// }
// echo "</table>";

// Execute the statement
if (mysqli_query($conn, $sql)) {
    echo "Record update successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
