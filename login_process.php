<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role'] = $user['role']; // Store role
            $_SESSION['dob'] = $user['dob']; // Store role

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: admin/dashboard.php");
            } elseif ($user['role'] == 'user') {
                header("Location: user/dashboard.php");
            } elseif ($user['role'] == 'reader') {
                header("Location: reader/dashboard.php");
            }
            exit();
        } else {
            echo "<script>alert('Incorrect password!'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email not registered!'); window.location='login.php';</script>";
    }

    mysqli_close($conn);
}
?>
