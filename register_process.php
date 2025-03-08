<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Validate input
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $full_name = trim($_POST['full_name']);
    $date_of_birth = trim($_POST['date_of_birth']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if any required fields are empty
    if (empty($first_name) || empty($last_name) || empty($full_name) || empty($date_of_birth) || empty($email) || empty($password)) {
        echo "<script>alert('Please fill in all required fields.'); window.location='register.php';</script>";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.location='register.php';</script>";
        exit();
    }

    // Check if email already exists using prepared statements
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email already exists! Try another one.'); window.location='register.php';</script>";
        exit();
    }
    $stmt->close();

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO users (first_name, middle_name, last_name, username, dob, email, password, role) VALUES (?, ?, ?, ?, ?, ?, ?, 'user')");
    $stmt->bind_param("sssssss", $first_name, $middle_name, $last_name, $full_name, $date_of_birth, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! You can now login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error: Something went wrong.'); window.location='register.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
