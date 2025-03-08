<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
	header("Location: ../login.php");
	exit();
}
include '../layouts/header.php';
?>
<style>
	input{
		width: 100%;
		margin-bottom: 10px;
	}
</style>

<h2 class="mb-4" style="line-height: 1.5;">Temporary User Registration</h2>

<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
	echo '<div class="alert alert-success">Temporary user created successfully!</div>';
}
?>

<form action="process_temporary_user.php" method="POST">
    <div class="mb-3">
        <input type="text" class="  " id="full_name" name="full_name" placeholder="Full Name" required>
    </div>

	<div class="mb-3">
    <input type="text" class="" id="dob" name="dob" placeholder="Date of Birth" required 
           onfocus="this.type='date'" 
           onblur="if(!this.value) this.type='text'">
</div>


    <div class="mb-3">
        <input type="email" class="" id="email" name="email" placeholder="Email" required>
    </div>

    <button type="submit" class="btn btn-primary">Register Temporary User</button>
</form>

<!-- <div class="atin  animated" style="margin-top : 20px">
	<a href="../logout.php" class="btn">Logout</a>
</div> -->
<?php include '../layouts/footer.php'; ?>