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
                    <label class="pull-left" for="email"><span class="ion-ios-time-outline"></span> Email</label>
                    <input class="pull-right" id="email" type="email" name="email" required />
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="password"><span class="ion-ios-calendar-outline"></span> Pass</label>
                    <input class="pull-right" id="password" type="password" name="password" required />
                </div>
                <div class="action flipInY animated">
                    <button class="btn" type="submit" name="login">Login</button>
                </div>
                <div class="action flipInY animated">
                    <p>If you don't have an account, .</p>
                    <button class="btn"><a class="btn" href="register.php">Register Here</a>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
