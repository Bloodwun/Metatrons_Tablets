<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] != 'reader' && $_SESSION['role'] != 'consultant')) {
    header("Location: ../login.php");
    exit();
}

include '../layouts/header.php';
?>

<div class="content">
    <div class="compose">
        <div class="forms">
            <h2>Consultant/Reader Page</h2>

            <!-- Tarot Card Dropdown -->
            <div class="group clearfix slideInLeft animated">
                <label class="pull-left" for="tarot_card">Select Tarot Card</label>
                <select class="pull-right" name="tarot_card" id="tarot_card" required>
                    <option value="">-- Select Tarot Card --</option>
                    <option value="The Fool">The Fool</option>
                    <option value="The Magician">The Magician</option>
                    <option value="The High Priestess">The High Priestess</option>
                    <option value="The Empress">The Empress</option>
                    <option value="The Emperor">The Emperor</option>
                    <option value="The Hierophant">The Hierophant</option>
                    <option value="The Lovers">The Lovers</option>
                    <option value="The Chariot">The Chariot</option>
                    <option value="Strength">Strength</option>
                    <option value="The Hermit">The Hermit</option>
                    <option value="Wheel of Fortune">Wheel of Fortune</option>
                </select>
            </div>

            <!-- Question Category Dropdown -->
            <div class="group clearfix slideInLeft animated">
                <label class="pull-left" for="question_category">Question Category</label>
                <select class="pull-right" name="question_category" id="question_category" required>
                    <option value="">-- Select Category --</option>
                    <option value="Love">Love</option>
                    <option value="Career">Career</option>
                    <option value="Health">Health</option>
                    <option value="Finance">Finance</option>
                    <option value="Spirituality">Spirituality</option>
                </select>
            </div>

            <!-- Textarea for Consultant Input -->
            <div class="group clearfix slideInLeft animated">
                <label class="pull-left" for="reading_data">Consultant Reading</label>
                <textarea class="pull-right" name="reading_data" id="reading_data" rows="5" placeholder="Enter reading details..." required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="group clearfix slideInLeft animated">
                <button class="btn" id="submitReading">Submit Reading</button>
            </div>

        </div>
    </div>
</div>

<?php include '../layouts/reader-nav.php'; ?>
<?php include '../layouts/footer.php'; ?>

<!-- JavaScript for Handling Submission -->
<script>
document.getElementById('submitReading').addEventListener('click', function() {
    let tarotCard = document.getElementById('tarot_card').value;
    let questionCategory = document.getElementById('question_category').value;
    let readingData = document.getElementById('reading_data').value;

    if (!tarotCard || !questionCategory || !readingData) {
        alert("Please fill in all fields!");
        return;
    }

    // Send data to the backend using AJAX (if needed)
    console.log({
        tarotCard: tarotCard,
        questionCategory: questionCategory,
        readingData: readingData
    });

    alert("Reading submitted successfully!");
});
</script>
