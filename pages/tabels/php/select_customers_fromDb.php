<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketsalesdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the table input from the form
$table_name = 'client';

// Sanitize the input to prevent SQL injection attacks
$table_name = mysqli_real_escape_string($conn, $table_name);

// Query the database to check if the user exists
$sql = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

echo "<table>";
echo "<tr><th>Client ID</th><th>Passport Number</th><th>Last Name</th><th>First Name</th><th>Patronymic</th><th>Action</th><th>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["ClientID"] . "</td><td>" . $row["passport_number"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["patronymic"] . "</td><td><button onclick='deleteRow(" . $row["ClientID"] . ")'>Delete</button></td> <td><button onclick='updateRow(" . $row["ClientID"] . ")'>Update</button></td> </tr>";
}
echo "</table>";


?>