<?php include 'includes/header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red'>" . htmlspecialchars($_GET['error']) . "</p>";
}
?>

<form action="login_process.php" method="POST">
    <div class="content">
        <div class="compose">
            <div class="forms">
                <div class="group clearfix slideInRight animated">
                    <label class="pull-left" for="email">Email</label>
                    <input class="pull-right" type="email" name="email" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="password">Password</label>
                    <input class="pull-right" type="password" name="password" required>
                </div>
                <div class="action rollIn animated">
                <button class="btn" type="submit" name="login">Login</button>
                </div>
                <div class="register-link">
                    <p>If you don't have an account, .</p>
                    <button class="btn"><a class="btn" href="register.php">Register Here</a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</form>




<?php include 'includes/footer.php'; ?>