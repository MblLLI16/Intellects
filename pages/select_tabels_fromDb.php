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
$table_name = $_POST['table_name'];

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
echo "<tr><th>Column 1</th><th>Column 2</th><th>Column 3</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["column1"] . "</td><td>" . $row["column2"] . "</td><td>" . $row["column3"] . "</td></tr>";
}
echo "</table>";

?>