<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

include '../layouts/header.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitTarot'])) {
    $card_name = mysqli_real_escape_string($conn, $_POST['cardId']);
    $category_id = mysqli_real_escape_string($conn, $_POST['questionCategory']);
    $reading_text = mysqli_real_escape_string($conn, $_POST['userQuestion']);

    if (empty($card_name) || empty($category_id) || empty($reading_text)) {
        echo "<script>alert('Please fill all fields before submitting.');</script>";
    } else {
          // Find the card_id from tarot_cards table using card_name
		  $query = "SELECT id FROM tarot_cards WHERE card_name = ?";
		  $stmt = $conn->prepare($query);
		  $stmt->bind_param("s", $card_name);
		  $stmt->execute();
		  $result = $stmt->get_result();
  
		  if ($row = $result->fetch_assoc()) {
			  $card_id = $row['id']; // Get card_id
  
			  // Insert into tarot_readings
			  $insertQuery = "INSERT INTO tarot_readings (card_id, category_id, reading_text) VALUES (?, ?, ?)";
			  $stmt = $conn->prepare($insertQuery);
			  $stmt->bind_param("iis", $card_id, $category_id, $reading_text);
  
			  if ($stmt->execute()) {
				  echo "<script>alert('Tarot reading submitted successfully.'); window.location.href='personal-reading.php';</script>";
			  } else {
				  echo "<script>alert('Error submitting reading: " . $stmt->error . "');</script>";
			  }
		  } else {
			  echo "<script>alert('Error: No matching Tarot Card found.');</script>";
		  }
    }
}
?>
<style>
    .qr-scanner {
    width: 250px;
    height: 200px;
    margin: 5px 0px;
    border: 2px solid black;
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
}

</style>

<!-- Content Area -->
<div class="content">
    <div class="header">
        <h2>Tarot Reading</h2>
    </div>
    <div class="container mt-5"> 
	<form id="tarotForm" method="POST">
    <div class="mb-3 w-100">
        <textarea class="form-control w-100" id="userQuestion" name="userQuestion" required placeholder="Enter Your Question" style="width:100%;"></textarea>
    </div>
    <div class="mb-3">
        <label for="questionCategory" class="form-label">Question Category</label>
        <select class="form-select" id="questionCategory" name="questionCategory" required>
            <?php
            $sql = "SELECT * FROM tarot_categories";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['category_name'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="mb-3" style="margin-top:10px;">
        <input type="text" id="qr-result" name="cardId" class="form-control mt-2" placeholder="Tarot Card"  style="width:100%;">
    </div>
    <center>
    <div id="qr-reader" class="mt-3 qr-scanner" ></div>
    </center>

    <button type="submit" class="btn btn-primary" name="submitTarot">Submit</button>
</form>

    </div>
</div>

<!-- QR Code Scanner Script -->
<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
<script>
    let qrReader;

    function startScanning() {
		// if (!confirm("Allow access to your camera for QR scanning?")) {
        //     return; // Stop if the user cancels
        // }
        qrReader = new Html5Qrcode("qr-reader");

        qrReader.start(
            { facingMode: "environment" }, // Use back camera
            { fps: 10, qrbox: 250 },
            (decodedText) => {
                document.getElementById("qr-result").value = decodedText; // Update input field
                qrReader.stop(); // Stop scanning after successful detection
                document.getElementById("stopScan").style.display = "none"; // Hide Stop button
            },
            (errorMessage) => { console.log("Scanning error: ", errorMessage); }
        ).catch((err) => { console.log("Camera error: ", err); });

        document.getElementById("stopScan").style.display = "inline-block"; // Show Stop button
    }

    document.addEventListener("DOMContentLoaded", function () {
        startScanning(); // Start scanning when page loads
    });

    document.getElementById("stopScan").addEventListener("click", function () {
        if (qrReader) {
            qrReader.stop().then(() => {
          
            }).catch((err) => {
                console.log("Error stopping scanner: ", err);
            });
        }
    });
</script>

<?php include '../layouts/footer.php'; ?>
