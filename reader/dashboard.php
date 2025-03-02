<?php

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'consultant') {
	header("Location: ../login.php");
	exit();
}
include '../layouts/header.php';
?>

<h2>consultant Dashboard</h2>
<div class="html profile visible">
		<div class="photo flipInX animated">
			<img src="https://raw.githubusercontent.com/khadkamhn/secret-project/master/img/mohan.png" />
			<div class="social">
				<a href="https://facebook.com/khadkamhn" class="soc-item soc-count-1"><span
						class="ion-social-facebook"></span></a>
				<a href="https://twitter.com/khadkamhn" class="soc-item soc-count-2"><span
						class="ion-social-twitter"></span></a>
				<a href="https://github.com/khadkamhn" class="soc-item soc-count-3"><span
						class="ion-social-github"></span></a>
				<a href="https://pinterest.com/khadkamhn" class="soc-item soc-count-4"><span
						class="ion-social-pinterest"></span></a>
				<a href="https://np.linkedin.com/in/khadkamhn" class="soc-item soc-count-5"><span
						class="ion-social-linkedin"></span></a>
				<a href="https://codepen.io/khadkamhn" class="soc-item soc-count-6"><span
						class="ion-social-codepen"></span></a>
				<a href="skype:khadkamhn?userinfo" class="soc-item soc-count-7"><span
						class="ion-social-skype"></span></a>
				<a href="http://dribbble.com/khadkamhn" class="soc-item soc-count-8"><span
						class="ion-social-dribbble"></span></a>
			</div>
		</div>
        <div class="details">
    <p class="heading flipInY animated">
        <span class="name">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
        <span class="position">Web/Graphic Designer</span>
    </p>
    <p class="text fadeInUp animated">
        <strong>Your Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?>
    </p>
    <p class="text fadeInUp animated">
        <strong>User ID:</strong> <?php echo htmlspecialchars($_SESSION['user_id']); ?>
    </p>
    <p class="text fadeInUp animated">
        <strong>Role:</strong> <?php echo htmlspecialchars($_SESSION['role']); ?>
    </p>
    <p class="text fadeInUp animated">
        <strong>Date of Birth:</strong> <?php echo htmlspecialchars($_SESSION['dob']); ?>
    </p>
</div>

	</div>
<!-- <div class="atin  animated" style="margin-top : 20px">
	<a href="../logout.php" class="btn">Logout</a>
</div> -->
<?php include '../layouts/footer.php'; ?>