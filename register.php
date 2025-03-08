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
    <input id="dob" class="" type="text" name="date_of_birth" required 
           placeholder="Date of Birth"
           onfocus="this.type='date'; this.showPicker()" 
           onblur="if(!this.value) this.type='text'">
</div>

<script>
    document.getElementById("dob").addEventListener("focus", function () {
        this.type = 'date'; // Ensures date picker shows up
        this.showPicker();  // Opens date picker on focus
    });

    document.getElementById("dob").addEventListener("blur", function () {
        if (!this.value) {
            this.type = 'text'; // Changes back to text if empty
        }
    });
</script>



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
