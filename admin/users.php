<?php
require_once "../admin-layouts/header.php";

// Handle status update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];

    // Fetch current status
    $query = "SELECT status FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Toggle status (Assuming 'Active' and 'Inactive')
        $newStatus = ($user['status'] === 'Active') ? 'Inactive' : 'Active';

        // Update status in database
        $updateQuery = "UPDATE users SET status = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("si", $newStatus, $userId);
        $updateStmt->execute();
    }

    // Redirect to refresh page
    header("Location: users.php");
    exit;
}

// Handle experience update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_user_id'])) {
    $userId = $_POST['edit_user_id'];
    $newExperience = $_POST['tarot_experience'];

    // Update tarot_experience in database
    $updateQuery = "UPDATE users SET tarot_experience = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("si", $newExperience, $userId);
    $updateStmt->execute();

    // Redirect to refresh the page
    header("Location: users.php");
    exit;
}

// Fetch all users
$query = "SELECT id, username, email, status, tarot_experience FROM users";
$result = $conn->query($query);
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Content Area -->
<div class="content">
    <div class="header">
        <h2>Users</h2>
    </div>
    <div class="container mt-4">
        <table border="1" width="100%" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Tarot Experience</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['status']) ?></td>
                        <td><?= htmlspecialchars($row['tarot_experience']) ?></td>
                        <td>
                            <!-- Status Toggle Form -->
                            <form method="POST" action="users.php" class="d-inline">
                                <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                                <button type="submit" class="btn <?= ($row['status'] === 'Active') ? 'btn-danger' : 'btn-success' ?>">
                                    <?= ($row['status'] === 'Active') ? 'Deactivate' : 'Activate' ?>
                                </button>
                            </form>

                            <!-- Edit Button (Opens Modal) -->
                            <button class="btn btn-primary edit-btn" 
                                data-id="<?= $row['id'] ?>" 
                                data-experience="<?= $row['tarot_experience'] ?>" 
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                Edit
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap Modal for Editing Tarot Experience -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Tarot Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="users.php">
                    <input type="hidden" name="edit_user_id" id="edit_user_id">

                    <label for="tarot_experience" class="form-label">Tarot Experience</label>
                    <select name="tarot_experience" id="tarot_experience" class="form-control">
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Experienced">Experienced</option>
                        <option value="Expert">Expert</option>
                    </select>

                    <div class="modal-footer mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $(".edit-btn").click(function() {
        var userId = $(this).data("id");
        var userExperience = $(this).data("experience");

        // Populate modal fields
        $("#edit_user_id").val(userId);
        $("#tarot_experience").val(userExperience);
    });
});
</script>

<?php
require_once "../admin-layouts/footer.php";
$conn->close();
?>
