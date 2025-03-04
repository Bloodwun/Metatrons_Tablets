<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'consultant') {
    header("Location: ../login.php");
    exit();
}

include '../layouts/header.php';

// Initialize user array to avoid undefined variable errors
$user = [
    'status' => $_SESSION['status'] ?? 'Inactive',
    'tarot_experience' => $_SESSION['tarot_experience'] ?? 'Beginner',
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    // Fetch user details before updating
    $stmt = $conn->prepare("SELECT username, email, status, tarot_experience, cash_app_username, paypal_email FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Assign existing values if POST fields are empty
        $name = !empty($_POST['name']) ? $_POST['name'] : $user['username'];
        $email = !empty($_POST['email']) ? $_POST['email'] : $user['email'];
        $status = !empty($_POST['status']) ? $_POST['status'] : $user['status'];
        $tarot_experience = !empty($_POST['tarot_experience']) ? $_POST['tarot_experience'] : $user['tarot_experience'];
        $cash_app_username = !empty($_POST['cash_app_username']) ? $_POST['cash_app_username'] : $user['cash_app_username'];
        $paypal_email = !empty($_POST['paypal_email']) ? $_POST['paypal_email'] : $user['paypal_email'];

        // Prepare update query
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, status = ?, tarot_experience = ?, cash_app_username = ?, paypal_email = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $name, $email, $status, $tarot_experience, $cash_app_username, $paypal_email, $user_id);

        if ($stmt->execute()) {
            // Update session variables
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['status'] = $status;
            $_SESSION['tarot_experience'] = $tarot_experience;
            $_SESSION['cash_app_username'] = $cash_app_username;
            $_SESSION['paypal_email'] = $paypal_email;

            echo "<script>alert('Profile updated successfully!'); window.location.href='edit_profile.php';</script>";
        } else {
            echo "<script>alert('Error updating profile: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
$user_id = $_SESSION['user_id'];

// Fetch user details
$stmt = $conn->prepare("SELECT username, email, status, tarot_experience, cash_app_username, paypal_email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "<script>alert('User not found!');</script>";
    $user = ['username' => '', 'email' => '', 'status' => '', 'tarot_experience' => '', 'cash_app_username' => '', 'paypal_email' => ''];
}
?>

<div class="container">
    <h2>Edit Profile</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['username'] ?? '') ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required><br><br>

        <label>Status:</label>
        <select name="status">
            <option value="Active" <?= ($user['status'] === "Active") ? "selected" : "" ?>>Active</option>
            <option value="Inactive" <?= ($user['status'] === "Inactive") ? "selected" : "" ?>>Inactive</option>
        </select><br><br>

        <label>Tarot Experience:</label>
        <select name="tarot_experience" id="tarot_experience" onchange="togglePaymentFields()">
            <option value="Beginner" <?= ($user['tarot_experience'] === "Beginner") ? "selected" : "" ?>>Beginner</option>
            <option value="Intermediate" <?= ($user['tarot_experience'] === "Intermediate") ? "selected" : "" ?>>Intermediate</option>
            <option value="Experienced" <?= ($user['tarot_experience'] === "Experienced") ? "selected" : "" ?>>Experienced</option>
            <option value="Expert" <?= ($user['tarot_experience'] === "Expert") ? "selected" : "" ?>>Expert</option>
        </select><br><br>

        <!-- Payment Options -->
        <div id="payment-options" style="<?= ($user['tarot_experience'] === 'Expert' || $user['tarot_experience'] === 'Experienced') ? '' : 'display: none;' ?>">
            <label>PayPal Email:</label>
            <input type="email" name="paypal_email" value="<?= htmlspecialchars($user['paypal_email'] ?? '') ?>"><br><br>

            <label>Cash App Username:</label>
            <input type="text" name="cash_app_username" value="<?= htmlspecialchars($user['cash_app_username'] ?? '') ?>"><br><br>
        </div>

        <!-- Update Profile Button -->
        <button type="submit" class="btn">Update Profile</button>
    </form>
</div>

<script>
    function togglePaymentFields(event) {
        if (event) event.preventDefault(); // Prevent form submission

        let experience = document.getElementById('tarot_experience').value;
        let paymentOptions = document.getElementById('payment-options');

        if (experience === 'Experienced' || experience === 'Expert') {
            paymentOptions.classList.remove('hidden');
        } else {
            paymentOptions.classList.add('hidden');
        }
    }

    togglePaymentFields();
</script>

<?php include '../layouts/footer.php'; ?>