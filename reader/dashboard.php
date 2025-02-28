<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'reader') {
    header("Location: ../login.php");
    exit();
}

include '../layouts/header.php';

?>

<h2>Reader Dashboard</h2>
<p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
<p>Your email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
<div class="atin  animated" style="margin-top : 20px">
	<a href="../logout.php" class="btn">Logout</a>
</div>
<?php include '../layouts/reader-nav.php'; ?>
<?php include '../layouts/footer.php'; ?>
