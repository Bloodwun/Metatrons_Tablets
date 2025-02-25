<?php include 'includes/header.php'; ?>

<form action="register_process.php" method="POST">
    <div class="content">
        <div class="compose">
            <div class="forms">
                <h2>Register</h2>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="first_name">First Name</label>
                    <input class="pull-right" type="text" name="first_name" >
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="middle_name">Middle Name</label>
                    <input class="pull-right" type="text" name="middle_name">
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="last_name">Last Name</label>
                    <input class="pull-right" type="text" name="last_name" >
                </div>
                <div class="group clearfix slideInRight animated">
                    <label class="pull-left" for="full_name">Nick Name</label>
                    <input class="pull-right" type="text" name="full_name" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="date_of_birth">Dob</label>
                    <input class="pull-right" type="date" name="date_of_birth" required>
                </div>
                <div class="group clearfix slideInRight animated">
                    <label class="pull-left" for="email">Email</label>
                    <input class="pull-right" type="email" name="email" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <label class="pull-left" for="password">Pass</label>
                    <input class="pull-right" type="password" name="password" required>
                </div>
                <div class="action rollIn animated">
                    <button class="btn" type="submit" name="register">Register</button>
                </div>
                <div class="login-link">
                    <p>Already have an account? </p>
                    <button class="btn"><a href="login.php">Login</a></button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include 'includes/footer.php'; ?>
