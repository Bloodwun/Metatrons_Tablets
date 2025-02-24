<?php
require_once "../db.php";
$category = $_POST['category'];
$card = $_POST['card'];
$response = $_POST['response'];

$sql = "INSERT INTO user_readings (category, tarot_card, response) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $category, $card, $response);
if (mysqli_stmt_execute($stmt)) {
    echo "Response saved successfully!";
} else {
    echo "Error saving response.";
}
mysqli_close($conn);
?>
