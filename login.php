<?php include 'includes/header.php'; ?>

<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red'>" . htmlspecialchars($_GET['error']) . "</p>";
}
?>

<div class="content">
    <form action="login_process.php" method="POST">
        <div class="html compose visible">
            <div class="forms">
                <div class="group clearfix slideInRight animated">
                    <input class="pull-right" id="email" type="email" name="email" placeholder="Email" required />
                </div>
                <div class="group clearfix slideInLeft animated">
                    <input class="pull-right" id="password" type="password" name="password" placeholder="Password" required />
                </div>
                <div class="action flipInY animated">
                    <button class="btn" type="submit" name="login">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
