<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'consultant') {
    header("Location: ../login.php");
    exit();
}
include '../layouts/header.php';
?>

<h2>Consultant Dashboard</h2>
<div class="html profile visible">
  
    <div class="details">
        <p class="heading flipInY animated">
            <span class="name">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
            <span class="position">Web/Graphic Designer</span>
        </p>
        <p class="text fadeInUp animated"><strong>Your Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
        <p class="text fadeInUp animated"><strong>User ID:</strong> <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
        <p class="text fadeInUp animated"><strong>Role:</strong> <?php echo htmlspecialchars($_SESSION['role']); ?></p>
        <p class="text fadeInUp animated"><strong>Date of Birth:</strong> <?php echo htmlspecialchars($_SESSION['dob']); ?></p>
        <p class="text fadeInUp animated"><strong>Status:</strong> <?php echo htmlspecialchars($_SESSION['status']); ?></p>
        <p class="text fadeInUp animated"><strong>Tarot Experience:</strong> <?php echo htmlspecialchars($_SESSION['tarot_experience']); ?></p>
    </div>
</div>

<!-- Edit Profile Button -->
<div class="edit-profile-btn" style="margin-top: 20px">
    <a href="edit_profile.php" class="btn">Edit Profile</a>
</div>

<?php include '../layouts/footer.php'; ?>
