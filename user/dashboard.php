<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
	header("Location: ../login.php");
	exit();
}
include '../layouts/header.php';
?>

<h2>User Dashboard</h2>
<p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
<p>Your email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>

<div class="atin  animated" style="margin-top : 20px">
	<a href="../logout.php" class="btn">Logout</a>
</div>
<?php include '../layouts/user-nav.php'; ?>
<?php include '../layouts/footer.php'; ?>