

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
        <?php

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'user') { ?>
        <a href="..//user/dashboard.php"><span class=""></span> Profile</a>
        <a href="/user/personal-reading.php"><span class=""></span> Personal Reading</a>
        <a href="../user/temporary_user_form.php"><span class=""></span> Add a Temporary User</a>
        <a href="..//user/dashboard.php"><span class=""></span> View Profile</a>
        <a href="/user/private-session.php"><span class=""></span> Start a Live Private Session</a>
        <a href="/user/store.php"><span class=""></span> Store</a>
        <a href="/logout.php"><span class=""></span> Logout</a>
    <?php
    } else if ($_SESSION['role'] == 'consultant') { ?>
        <a href="/user/add-card-reading.php" class="list-group-item list-group-item-action">
            <span class="bi bi-book"></span> Add a Card Reading
        </a>
        <a href="/user/personal-reading.php" class="list-group-item list-group-item-action">
            <span class="bi bi-person-lines-fill"></span> Personal Reading
        </a>
        <a href="../reader/temporary_user_form.php" class="list-group-item list-group-item-action">
            <span class="bi bi-person-plus"></span> Add a Temporary User
        </a>
        <a href="../reader/dashboard.php" class="list-group-item list-group-item-action">
            <span class="bi bi-person-circle"></span> View Profile
        </a>
        <a href="/user/private-session.php" class="list-group-item list-group-item-action">
            <span class="bi bi-camera-video"></span> Start a Live Private Session
        </a>
        <a href="/user/store.php" class="list-group-item list-group-item-action">
            <span class="bi bi-shop"></span> Store (Buy Tarot Decks)
        </a>
        <a href="/user/store.php" class="list-group-item list-group-item-action">
            <span class="bi bi-shop"></span> Billing 
        </a>
        <a href="/logout.php" class="list-group-item list-group-item-action text-danger">
            <span class="bi bi-box-arrow-right"></span> Logout
        </a>
    <?php
    }
} else { ?>
    <a href="/index.php"><span class=""></span> Home</a>
    <a href="/login.php"><span class=""></span> Login</a>
    <a href="/register.php"><span class=""></span> Register</a>
<?php } ?>

        </div>
    </div>
</div>