
<?php
$servername = "localhost";
$username = "root"; // Change this if your database username is different
$password = ""; // Change this if your database has a password
$database = "mob_display"; // Change this to your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

