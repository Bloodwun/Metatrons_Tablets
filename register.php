<?php include 'includes/header.php'; ?>

<form action="register_process.php" method="POST">
    <div class="content">
        <div class="compose">
            <div class="forms">
                <h2>Register</h2>
                <div class="group clearfix slideInLeft animated">
                    <input class="" type="text" name="first_name" placeholder="First Name">
                </div>
                <div class="group clearfix slideInLeft animated">
                    <input class="" type="text" name="middle_name" placeholder="Middle Name">
                </div>
                <div class="group clearfix slideInLeft animated">
                    <input class="" type="text" name="last_name" placeholder="Last Name">
                </div>
                <div class="group clearfix slideInRight animated">
                    <input class="" type="text" name="full_name" placeholder="Nick Name" required>
                </div>
                <div class="group clearfix slideInLeft animated">
    <input class="" type="date" name="date_of_birth" required 
           onfocus="this.showPicker()" 
           onblur="this.setAttribute('placeholder', 'Date of Birth')" 
           placeholder="Date of Birth">
</div>

                <div class="group clearfix slideInRight animated">
                    <input class="" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="group clearfix slideInLeft animated">
                    <input class="" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="action rollIn animated">
                    <button class="btn" type="submit" name="register">Register</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include 'includes/footer.php'; ?>
