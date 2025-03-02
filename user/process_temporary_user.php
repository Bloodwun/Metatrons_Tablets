<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST["full_name"]);
    $dob = $_POST["dob"];
    $email = trim($_POST["email"]);
    $role = "temp"; // Assigning the role as 'temp'

    // Prepare the SQL statement
    $sql = "INSERT INTO users (username, dob, email, role) VALUES (?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters (4 parameters, so 4 types: "ssss")
        mysqli_stmt_bind_param($stmt, "ssss", $full_name, $dob, $email, $role);
        
        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect back to the form with success message
            header("Location: temporary_user_form.php?success=1");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
