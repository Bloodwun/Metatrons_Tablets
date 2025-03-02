<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
	header("Location: ../login.php");
	exit();
}
include '../layouts/header.php';
?>

<h2 class="mb-4">Temporary User Registration</h2>

<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
	echo '<div class="alert alert-success">Temporary user created successfully!</div>';
}
?>

<form action="process_temporary_user.php" method="POST">
	<div class="mb-3">
		<label for="full_name" class="form-label">Full Name</label>
		<input type="text" class="pull-right" id="full_name" name="full_name" required>
	</div>

	<div class="mb-3">
		<label for="dob" class="form-label">Date of Birth</label>
		<input type="date" class="pull-right" id="dob" name="dob" required>
	</div>

	<div class="mb-3">
		<label for="email" class="form-label">Email</label>
		<input type="email" class="pull-right" id="email" name="email" required>
	</div>

	<button type="submit" class="btn btn-primary">Register Temporary User</button>
</form>
<!-- <div class="atin  animated" style="margin-top : 20px">
	<a href="../logout.php" class="btn">Logout</a>
</div> -->
<?php include '../layouts/footer.php'; ?>