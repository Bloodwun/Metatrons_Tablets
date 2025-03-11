<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
	header("Location: ../login.php");
	exit();
}
include '../layouts/header.php';
?>

<div>
    <h3>You have reached the end of the internet.</h3>
    <p>We are currently building the next world-shattering page.</p>
    <p>Please come back when our work is complete.</p>
</div>

<!-- <div class="atin  animated" style="margin-top : 20px">
	<a href="../logout.php" class="btn">Logout</a>
</div> -->
<?php include '../layouts/footer.php'; ?>