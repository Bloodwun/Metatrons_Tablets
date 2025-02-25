<?php




?>

<div class="sidebar">
    <div class="sidebar-overlay"></div>
    <div class="sidebar-content">
        <div class="top-head">
            <?php if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') { ?>
                <div class="name">MetaTarot</div>

            <?php } else { ?>
                <div class="name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></div>
            <?php } ?>
            <!-- <div class="email">contact@mohankhadka.com.np</div> -->
        </div>

        <div class="nav-left">
            <?php if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') { ?>
                <a href="/index.php"><span class=""></span> Home</a>
                <a href="/login.php"><span class=""></span> Login</a>
                <a href="/register.php"><span class=""></span> Register</a>
                <?php
            } else { ?>
                <a href="/user/dashboard.php"><span class=""></span> Profile</a>
                <a href="/logout.php"><span class=""></span> Logout</a>




            <?php } ?>
        </div>
    </div>
</div>