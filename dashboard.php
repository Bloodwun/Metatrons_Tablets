<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/header.php';
?>

<div class="content">
			
			<div class=" welcome visible">
				<div class="datetime bounceInLeft animated">
					<div class="day lightSpeedIn animated">Thursday</div>
					<div class="date lightSpeedIn animated">June 18, 2015</div>
					<div class="time lightSpeedIn animated">08:00 AM</div>
				</div>
			</div>
			<div class=" welcome visible " style="margin-top : 20px">
				<div class="datetime bounceInLeft animated">
					<div class=" animated">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</div>
					<div class=" animated">Your email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></div>
				
				</div>
			</div>
			
	</div>

	<div class="atin  animated" style="margin-top : 20px">
             <a href="logout.php" class="btn" >Logout</a>
                </div>
			

<?php include 'includes/footer.php'; ?>
