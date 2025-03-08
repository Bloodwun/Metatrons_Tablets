<?php include 'includes/header.php'; ?>

<form action="register_process.php" method="POST">
    <div class="content">
        <div class="compose">
            <div class="forms">
                <h2>Register</h2>
                <div class="group clearfix slideInLeft animated">
                    <input type="text" name="first_name" placeholder="First Name" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <input type="text" name="middle_name" placeholder="Middle Name">
                </div>
                <div class="group clearfix slideInLeft animated">
                    <input type="text" name="last_name" placeholder="Last Name" required>
                </div>
                <div class="group clearfix slideInRight animated">
                    <input type="text" name="full_name" placeholder="Nick Name" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <input id="dob" type="date" name="date_of_birth" required>
                </div>
                <div class="group clearfix slideInRight animated">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="action rollIn animated">
                    <button class="btn" type="submit" name="register">Register</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include 'includes/footer.php'; ?>
